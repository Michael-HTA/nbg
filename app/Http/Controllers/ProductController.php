<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        $categories = Category::all();

        return view('products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function search(Request $request)
    {
        $query = Product::query();

        if ($request->has('price') && $request->price !== null && $request->price !== '') {
            $query->where('price', '<=', $request->price);
        }

        elseif ($request->has('category') && $request->category !== null && $request->category !== '') {
            $query->where('category_id', $request->category);
        }

        $products = $query->get();

        $categories = Category::all();

        return view('products', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function detail($id)
    {

        $product = Product::find($id);

        return view('productDetail', ['product' => $product]);
    }
}
