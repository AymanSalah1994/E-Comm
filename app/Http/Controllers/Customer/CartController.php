<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\AddCartItemRequest;
use App\Http\Requests\Customer\DeleteCartItemRequest;
use App\Http\Requests\Customer\UpdateCartItemRequest;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\WishListItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCartItem(AddCartItemRequest $request)
    {
        if (Auth::check()) {
            if (CartItem::where('product_id', $request->product_id)->where('user_id', $request->user()->id)->where('status', '0')->exists()) {
                return response()->json([
                    'status' => trans('Item is Already Added')
                ]);
            } else {
                $cartItemData = $request->handleRequest();
                $cartItem = CartItem::create($cartItemData);
                $cartItem->save();
                return response()->json([
                    'status' => trans('Item is Added !')
                ]);
            }
        } else {
            return response()->json([
                'status' => trans('Please Log in First')
            ]);
        }
    }

    public function addWishListItem(Request $request)
    {
        if (Auth::check()) {
            if (WishListItem::where('product_id', $request->product_id)->where('user_id', $request->user()->id)->exists()) {
                return response()->json([
                    'status' => trans('Item is Already Added')
                ]);
            } else {
                $wishListItem  = new WishListItem();
                $wishListItem->user_id = $request->user()->id;
                $wishListItem->product_id = $request->product_id;
                $wishListItem->save();
                return response()->json([
                    'status' => trans('Item is Added !')
                ]);
            }
        } else {
            return response()->json([
                'status' => trans('Please Log in First')
            ]);
        }
    }


    public function viewCart()
    {
        $user = Auth::user();
        $currentCartItems = CartItem::Where('user_id', $user->id)->where('status', '0')->with('product')->get();
        foreach ($currentCartItems as $item) {
            if ($item->product->status == '0') {
                $outOfStockItem = CartItem::find($item->id);
                $outOfStockItem->delete();
            }
        }
        $currentCartItems = CartItem::Where('user_id', $user->id)->where('status', '0')->with('product')->get();
        $currentOrder = Order::where('user_id', $user->id)->where('status', '0')->first();
        // if ($currentOrder) {
        //     // If he Clears the Cart then this Order will be Null
        //     $total  = $currentOrder->total;
        //     ///
        // } else {
        //     $total = 0;
        // }
        // , 'total'
        return view('customer.view-cart', compact(['currentCartItems']));
    }

    public function deleteCartItem(DeleteCartItemRequest $request)
    {
        $cartItem  = CartItem::find($request->cartItemID);
        $cartItem->delete();
        return response()->json([
            'status' => trans('Item Deleted Successfully')
        ]);
    }

    public function clearCart()
    {
        $user = Auth::user();
        Order::where('user_id', $user->id)->where('status', '0')->delete();
        return redirect()->route('cart.view')->with('status', trans('Cart Cleared !'));
    }


    public function updateCartItem(UpdateCartItemRequest $request)
    {
        CartItem::where('id', $request->cartItemID)->update(['quantity' => $request->product_quantity]);
        return response()->json([
            'status' => 'Updated Quantity'
        ]);
    }

    public function viewWishList()
    {
        $user = Auth::user();
        $wishListItems = WishListItem::where('user_id', $user->id)->with('product')->get();
        return view('customer.wish-list', compact('wishListItems'));
    }

    public function deleteWishListItem(Request $request)
    {
        $wishListItem = WishListItem::find($request->wishListItemID);
        $wishListItem->delete();
        return response()->json([
            'status' => trans('Item Deleted Successfully')
        ]);
    }
}
