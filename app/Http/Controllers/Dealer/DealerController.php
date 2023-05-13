<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function index()
    {
        return view('dealer.home');
    }

    public function viewCheckedOrders()
    {
        $checkedOrders = Order::where('status', '1')->get();
        return view('dealer.view-checked-orders', compact('checkedOrders'));
    }

    public function orderDetails($id, $tracking_id)
    {
        $order = Order::find($id);
        $orderItems = CartItem::where('order_id', $order->id)->with(['product', 'product.user'])->get();
        $orderUser = $order->with('user')->first();
        return view('dealer.order-details', compact([
            'order', 'orderItems', 'orderUser'
        ]));
    }

    public function markPrepared($id)
    {
        $order = Order::find($id);
        $order->status  = '2';
        foreach ($order->cartItems as $item) {
            $item->status = '2';
            $item->save();
        }
        $order->save();
        return redirect()->route('dealer.panel.view.prepared.orders')->with('status', 'Order is Marked Prepared !');
    }

    public function viewPreparedOrders()
    {
        $orders = Order::where('status', '2')->orderBy('updated_at', 'DESC')->get();
        return view('dealer.view-prepared-orders', compact('orders'));
    }

    public function markDone($id)
    {
        $order = Order::find($id);
        $order->status  = '4';
        $order->save();
        foreach ($order->cartItems as $item) {
            $item->status = '4';
            $item->save();
        }
        return redirect()->route('dealer.panel.view.done.orders')->with('status', 'Order is Marked Done!');
    }

    public function viewDoneOrders()
    {
        $alldoneOrders = Order::where('status', '4')->orderBy('updated_at', 'DESC')->SearchWord()->paginate(7);
        return view('dealer.view-done-orders', compact('alldoneOrders'));
    }

    public function viewToRefund($id, $tracking_id)
    {
        $order = Order::find($id);
        $orderItems = CartItem::where('order_id', $order->id)->with('product')->get();
        return view('dealer.view-order-to-refund', compact(['order', 'orderItems']));
    }

    public function refundOrder(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = '5';
        $order->save();
        foreach ($order->cartItems as $item) {
            $item->status = '5';
            $item->save();
        }
        return redirect()->route('dealer.panel.view.done.orders')->with('status', 'Done!');
    }

    public function refundItem(Request $request)
    {
        $order = Order::find($request->order_id);
        $item  = CartItem::find($request->item_id);
        $item->status = '5';
        $item->save();
        $new_Total =  $order->total - ($item->product->selling_price * $item->quantity);
        $order->total = $new_Total;
        $order->save();
        if ($order->cartItems->where('status', '4')->count() == 0) {
            $order->status = '5';
            $order->save();
        }
        if ($order->cartItems->where('status', '4')->count() >= 1) {
            return redirect()->back()->with('status', 'Item is Returned Back!');
        }
        return redirect()->route('dealer.panel.view.done.orders')->with('status', 'Item is Returned Back!');
    }

    public function checkedOrdersCounter()
    {
        $checkedOrdersCount = Order::where('status', '1')->count();
        return response()->json(['checkedOrdersCount' => $checkedOrdersCount]);
    }

    public function deleteItemIfNotFound(Request $request)
    {
        $cartItem = CartItem::find($request->item_);
        $order = Order::find($cartItem->order->id);
        $cartItem->delete();

        if ($order->cartItems->count() == 0) {
            $order->delete();
            return redirect()->route('dealer.panel.view.checked.orders')->with('status', 'Item AND order Deleted');
        } else {
            return redirect()->route('dealer.panel.view.order.details', [
                'id' =>  $order->id,
                'tracking_id' => $order->tracking_id
            ])->with('status', 'item Removed');
        }
    }
}
