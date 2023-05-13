<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\WishListItem;
use Illuminate\Support\Facades\Auth;

class CountingController extends Controller
{
    public function cartCount()
    {
        $user = Auth::user();
        $cartItems  = CartItem::where('user_id', $user->id)->where('status', '0')->get();
        $cartCount = $cartItems->count();
        return response()->json([
            'cart_count' => $cartCount
        ]);
    }

    public function wishListCount()
    {
        $user = Auth::user();
        $wishListItems  = WishListItem::where('user_id', $user->id)->get();
        $wishListItemCount = $wishListItems->count();
        return response()->json([
            'wlc' => $wishListItemCount
        ]);
    }
}
