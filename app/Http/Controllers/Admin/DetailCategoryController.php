<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product_category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product_category_detail;
use RealRashid\SweetAlert\Facades\Alert;

class DetailCategoryController extends Controller
{
    public function index()
    {

        $detail = Product_category_detail::all();

        return view('admin.detcategory.index', compact('detail'));
    }

    public function add()
    {
        $product = Product::all();
        $category = Product_category::all();

        return view('admin.detcategory.add', compact('product','category'));
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'category_id' => 'required',
        ]);

        DB::table('product_category_details')
            ->insert([
            'product_id' => $request->product_id,
            'category_id' => $request->category_id,
            ]);

            Alert::success('Congrats', 'Successfully Add Data');
        return redirect('admin/detailkategori/list');
    }

    public function edit($id)
    {
        $product = Product::all();
        $category = Product_category::all();
        $detail = DB::table('product_category_details')->where('id', $id)->first();
        return view('admin.detcategory.edit', compact('detail','product','category'));
    }

    public function editprocess(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'category_id' => 'required',
        ]);

        DB::table('product_category_details')->where('id', $id)
            ->update([
            'product_id' => $request->product_id,
            'category_id' => $request->category_id,
            ]);
            Alert::success('Congrats', 'Successfully Edit Data');
             return redirect('admin/detailkategori/list');
    }

    public function delete($id)
    {
        DB::table('product_category_details')->where('id', $id)->delete();
        Alert::error('Successfully Delete Data', '');
        return redirect()-> route('listdetcategory');
    }
}
