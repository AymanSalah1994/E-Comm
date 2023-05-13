<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'user')->SearchWord()->orderBy('updated_at', 'DESC')->paginate(7);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $allCategories = Category::all();
        return view('admin.product.create', compact('allCategories'));
    }
    public function store(ProductRequest $request)
    {
        $allRequestData = $request->handleRequest();
        Product::create($allRequestData);
        return redirect()->route('products.index')->with('status', 'Product Created Successfully');
    }

    public function edit(Product $product)
    {
        $allCategories = Category::all();
        $theProduct = Product::where('id', $product->id)->where('slug', $product->slug)->first();
        return view('admin.product.edit', compact('theProduct', 'allCategories'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $allReuestData  = $request->handleRequest();
        $theProduct  = Product::find($product->id);
        $theProduct->update($allReuestData);
        return redirect()->route('products.index')->with('status', 'Product Updated SuccessFully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Product Deleted Successfully');
    }
}
