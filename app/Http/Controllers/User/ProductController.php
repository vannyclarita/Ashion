<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function review($id)
    {
        $products = Product::find($id);
        $products->image = $products->images;
        $products->discount = $products->discounts;
        return view('user.review.index', compact('products'));
    }
}
