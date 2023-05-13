<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merchant\CreateProductRequest;
use App\Http\Requests\Merchant\ProfileRequest;
use App\Http\Requests\Merchant\UpdateProductRequest;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    public function home()
    {
        return view('merchant.index');
    }

    public function allProducts()
    {
        $products = request()->user()->products()->SearchWord()->paginate(10);
        return view('merchant.products', compact('products'));
    }

    public function viewProduct($slug)
    {
        $user = Auth::user();
        $product = Product::where('slug', $slug)->where('user_id', $user->id)->first();
        $categories = Category::all();
        return view('merchant.view-update', compact(['product', 'categories']));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('merchant.create-product', compact('categories'));
    }

    public function relatedOrders()
    {
        $user = Auth::user();
        $userProducts = $user->products->pluck('id')->toArray();
        $relatedCartItems = CartItem::where('status', '1')->whereIn('product_id', $userProducts)->with('product')->get();
        return view('merchant.related-orders', compact('relatedCartItems'));
    }

    public function relatedItemsCounter()
    {
        $user = Auth::user();
        $userProducts = $user->products->pluck('id')->toArray();
        $relatedCartItems = CartItem::where('status', '1')->whereIn('product_id', $userProducts)->get();
        $relatedCount = $relatedCartItems->count();
        return response()->json(['relatedCount' => $relatedCount]);
    }

    public function updateMerchantProfile(ProfileRequest $request)
    {
        $user = $request->user();
        $allData = $request->handleRequest();
        $user->update($allData);
        return redirect()->route('merchant.panel.index')->with('status', 'Profile Updated');
    }

    public function updateProduct(UpdateProductRequest $request)
    {
        $request->handleRequest();
        return redirect()->route('merchant.panel.products')->with('status', 'Product Updated');
    }

    public function storeProduct(CreateProductRequest $request)
    {
        $request->handleRequest();
        return redirect()->route('merchant.panel.products')->with('status', 'Product Created');
    }

    public function completedItems()
    {
        $user = Auth::user();
        $userProducts = $user->products->pluck('id')->toArray();
        $completedItems = CartItem::where('status', '4')->whereIn('product_id', $userProducts)->with('product')->get();
        return view('merchant.completed-orders', compact('completedItems'));
    }
}
