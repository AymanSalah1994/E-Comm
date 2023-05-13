<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::SearchWord()->paginate(8);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $allRequestData = $request->handleRequest();
        Category::create($allRequestData);
        return redirect()->route('admin.categories.index')->with('status', 'Category is Created');
    }

    public function edit($id, $slug)
    {
        $category = Category::findOrFail($id)->where('slug', $slug)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request)
    {
        $allRequestedData = $request->handleRequest();
        $category = Category::find($request->category_)->where('slug', $request->slug);
        $category->update($allRequestedData);
        return redirect()->route('admin.categories.index')->with('status', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('status', 'Category Deleted Successfully');
    }
}
