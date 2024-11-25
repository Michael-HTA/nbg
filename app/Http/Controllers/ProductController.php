<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Product;

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

    public function search(SearchRequest $request)
    {
        $query = Product::query();
       
        if ($request->filter === 'price') {

            $query->where('price', '<=', $request->search);

        }elseif ($request->filter === 'category') {

            $query->where('category_id', $request->search);

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
