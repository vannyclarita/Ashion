<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $category = Product_category::all();
        $products = Product::all();
        foreach ($products as $product){
            $product->image = $product->images->first();
            $product->discount = $product->discounts->first();
        }
        return view('user.product.index', compact('products','category'));
    }

    public function detailProduct($id){
        $products = Product::find($id);
        $products->image = $products->images;
        $products->discount = $products->discounts;
        // $review = Product_review::where('product_id', '=', $id)->get();
        // $review->responses = $review->responses;
        return view('user.product.detail', compact('products'));
    }

}
