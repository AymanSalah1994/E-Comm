<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $cartItems  = CartItem::Where('user_id', $user->id)->where('status', '0')->with('product')->get();
        foreach ($cartItems as $item) {
            if ($item->product->status == '0') {
                $outOfStockItem = CartItem::find($item->id);
                $outOfStockItem->delete();
            }
        }
        $cartItems = CartItem::Where('user_id', $user->id)->where('status', '0')->with('product')->get();
        return view('customer.orders.checkout', compact(['cartItems']));
    }

    public function confirmOrder(Request $request)
    {
        $user = Auth::user();
        $order_id = $request->checking_order;
        $order = Order::find($order_id);
        if ($user->orders->where('status', '1')->first()) {
            return redirect()->route('orders.all')->with('status', trans('You already have an Order in Progress, Return the Old Order to Cart and Check out again'));
        }
        if ($order) {
            $order->status = "1";
            $order->save();
            $order_cart_items = CartItem::where('order_id', $order_id)->get();
            foreach ($order_cart_items as $item) {
                $item->status = "1";
                $item->save();
            }
            $mail = new MailController();
            $mail->index($user->email);
            $anotherMail = new MailController();
            $anotherMail->managementEmail('ayman.1551.salah@gmail.com');
            // This To Call For Sending Email
            return redirect()->route('orders.all')->with('status', trans('Order and its Items are Updated!'));
        } else {
            return redirect()->route('orders.all')->with('status', trans('Something Wrong'));
        }
    }

    public function allOrders()
    {
        $user =  Auth::user();
        $orders = $user->orders;
        return view('customer.orders.all-orders', compact('orders'));
    }

    public function orderDetails($tracking_id)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('tracking_id', $tracking_id)->first();
        $cartItems = CartItem::where('order_id', $order->id)->with('product')->get();
        return view('customer.orders.order-details', compact(['order', 'cartItems']));
    }

    public function cancelOrder(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('tracking_id', $request->tracking_id)->first();
        $order_items = CartItem::where('order_id', $order->id)->get();
        foreach ($order_items as $item) {
            $cartItem  = CartItem::find($item->id);
            $cartItem->status = '3';
            $cartItem->save();
        }
        $order->status  = '3';
        $order->save();
        return redirect()->route('orders.all')->with('status', trans('Order is Cancelled'));
    }

    public function returnOrderToCart(Request $request)
    {
        $user = Auth::user();
        $returned_order  = Order::where('user_id', $user->id)->where('tracking_id', $request->tracking_id)->first();
        $active_order = Order::where('user_id', $user->id)->where('status', '0')->first();
        if ($active_order) {
            $returned_items  = $returned_order->cartItems;
            $active_items  = $active_order->cartItems;
            foreach ($returned_items as $item) {
                if ($active_items->contains('product_id', $item->product_id)) {
                    $item->delete();
                    // So , we Keep same Items But FROM the new Cart
                } else {
                    $item->status = '0';
                    $item->order_id = $active_order->id;
                    $item->save();
                }
            }
            $returned_order->delete();
            return redirect()->route('orders.all')->with('status', trans('Order is Returned to Cart'));
        } else {
            $returned_items  = $returned_order->cartItems;
            foreach ($returned_items as $item) {
                $item->status = '0';
                $item->save();
            }
            $returned_order->status = '0';
            $returned_order->save();
            return redirect()->route('orders.all')->with('status', trans('Order is Returned'));
        }
    }
}
