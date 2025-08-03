<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categorySlug = $request->query('category');

        $categories = Category::all();
        $selectedCategory = null;

        $products = Product::query();

        if ($categorySlug) {
            $selectedCategory = Category::where('slug', $categorySlug)->first();
            if ($selectedCategory) {
                $products->where('category_id', $selectedCategory->id);
            }
        }

        // Search by title or description
        if ($request->has('search') && $request->get('search') !== '') {
            $search = $request->get('search');
            $products->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $products->latest()->paginate(12);
        return view('pages.products.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $otherProducts = Product::where('id', '!=', $id)->latest()->take(3)->get();
        return view('pages.products.show', compact('product', 'otherProducts'));
    }
}

