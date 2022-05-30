<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction_detail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_review;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\Admin_notification;
use App\Models\Admin;

class ReviewController extends Controller
{
    public function review($id)
    {
        $products = Product::find($id);
        $products->image = $products->images;
        $products->discount = $products->discounts;
        return view('user.review.index', compact('products'));
    }

    public function addprocess(Request $request, $id)
    {
        $user = Admin::where('id', '=', '1')->get()->first();
        $request->validate([
            'review' => 'required',
            'rate' => 'required',
        ]);
        $review = new Product_review;
        $review->product_id = $id;
        $review->user_id = Auth::user()->id;
        $review->rate = $request->rate;
        $review->content = $request->review;
        $review->save();

        $user->notify(new Admin_notification ('Produk dengan id-'.$id.'Telah Direview'));

        Alert::success('Congrats', 'Successfully Add Review');
        return redirect()->route('list');
    }
}
