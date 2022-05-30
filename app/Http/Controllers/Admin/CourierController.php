<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CourierController extends Controller
{
    public function index()
    {
        $courier = Courier::all();
        return view('admin.courier.index', compact('courier'));
    }

    public function add()
    {

        return view('admin.courier.add');
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'courier' => 'required|unique:couriers',
        ]);

        $courier = new Courier();

        $courier->courier = $request->courier;
        $courier->save();

        Alert::success('Congrats', 'Successfully Add Data');

        return redirect()->route('listcourier');

    }

    public function edit($id)
    {
        $courier = DB::table('couriers')->where('id', $id)->first();
        return view('admin.courier.edit', compact('courier'));
    }

    public function editprocess(Request $request, $id)
    {
        $request->validate([
            'courier' => "required|unique:couriers,courier,$id",
        ]);

        DB::table('couriers')->where('id', $id)
            ->update([
            'courier' => $request->courier,
            ]);
            Alert::success('Congrats', 'Successfully Edit Data');
            return redirect()->route('listcourier');
    }

    public function delete($id)
    {
        DB::table('couriers')->where('id', $id)->delete();
        Alert::error('Successfully Delete Data', '');
        return redirect()-> route('listcourier');
    }
}
