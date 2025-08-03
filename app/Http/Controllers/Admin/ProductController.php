<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('pages.admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail'   => 'nullable|image',
            'images.*'    => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('images')) {
            $data['images'] = collect($request->file('images'))->map(function ($file) {
                return $file->store('product_images', 'public');
            })->toArray();
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail'   => 'nullable|image',
            'images.*'    => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('images')) {
            $data['images'] = collect($request->file('images'))->map(function ($file) {
                return $file->store('product_images', 'public');
            })->toArray();
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật thành công.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Xóa thành công.');
    }
}
