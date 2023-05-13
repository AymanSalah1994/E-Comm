<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\ReviewRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function submitReview(ReviewRequest $request)
    {
        if (Auth::check()) {
            $product = Product::where('slug', $request->review_product_id)->first();
            $final_result = $request->handleReuqest();
            if ($final_result) {
                return redirect()->route('product.details', $product->slug)->with('status', 'Review is Added');
            } else {
                return redirect()->route('product.details', $product->slug)->with('status-review-error', 'You Did NOT buy this Product !');
            }
        } else {
            return redirect()->back()->with('status-review-error', 'Please Log in First');
        }
    }
}
