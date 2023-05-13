<?php

namespace App\Http\Controllers\Customer\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class StoreController extends Controller
{
    public function index()
    {
        $vendors = User::where('role_as', '2')->take(5)->get();
        $new_products = Product::orderBy('created_at', 'DESC')->take(8)->get();
        $featured_products = Product::where('trending', '1')->take(5)->get();
        $featured_categories = Category::where('popular', '1')->take(5)->get();
        return view('customer.store.home', compact(['featured_products', 'featured_categories', 'new_products', 'vendors']));
    }

    public function categories()
    {
        $allCategories = Category::where('status', '1')->paginate(8);
        return view('customer.store.categories', compact('allCategories'));
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categoryProducts = $category->products()->where('status', '1')->get();
        return view('customer.store.category-products', compact(['categoryProducts', 'category']));
    }

    public function productDetails($slug)
    {
        $user = Request::user();
        $product = Product::where('slug', $slug)->with('user')->first();
        $reviews = Review::where('product_id', $product->id)->with('user')->get();
        $average_rating = Review::where('product_id', $product->id)->avg('rating_stars');
        $average_rating = round($average_rating);
        if ($user) {
            $user_review = Review::where('product_id', $product->id)->where('user_id', $user->id)->first();
        } else {
            $user_review = false;
        }
        $relatedProducts = Product::inRandomOrder()->where('category_id', $product->category_id)->orWhere('user_id', $product->user_id)->where('id', '!=', $product->id)->take(5)->get();
        return view('customer.store.product-details', compact(['product', 'average_rating', 'user_review', 'reviews', 'relatedProducts']));
    }

    public function allMerchants()
    {
        $all_merchants = User::where('role_as', '2')->with('products')->paginate(8);
        return view('customer.store.all-merchants', compact('all_merchants'));
    }

    public function merchantDetails($slug)
    {
        $merchant = User::where('slug', $slug)->first();
        return view('customer.store.merchant-details', compact('merchant'));
    }

    public function merchantProducts($slug)
    {
        $merchant = User::where('slug', $slug)->first();
        $products = $merchant->products()->paginate(8);
        return view('customer.store.merchant-products', compact('products', 'merchant'));
    }

    public function verifiyNotice()
    {
        return view('auth.verify');
    }
}
