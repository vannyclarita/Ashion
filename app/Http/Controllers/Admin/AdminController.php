<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
     public function index()
    {
        $admin = Admin::all();
        return view('admin.admin.index', compact('admin'));
    }

    public function add()
    {
        return view('admin.admin.add');
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'name' => 'required',
            'phone' => 'required|unique:admins|regex:/(0)[0-9]/|not_regex:/[a-z]/|max:14',
        ]);

        $user = new \App\Models\Admin;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt('password');
        $user->profile_image = 'admin.png';

        $user->save();

        Alert::success('Congrats', 'Successfully Add Data');
        return redirect('admin/list')->with('success', 'Data Admin Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $admin = DB::table('admins')->where('id', $id)->first();
        return view('admin.admin.edit', compact('admin'));
    }

     public function editprocess(Request $request, $id)
    {
        $request->validate([
            'username' => "required|unique:admins,username,$id",
            'name' => 'required',
            'phone' => "required|regex:/(0)[0-9]/|not_regex:/[a-z]/|max:14|unique:admins,phone,$id",
        ]);

        DB::table('admins')->where('id', $id)
            ->update([
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            ]);

            Alert::success('Congrats', 'Successfully Edit Data');
             return redirect('admin/list')->with('success', 'Berhasil Mengedit Data');;
    }
    public function delete($id)
    {
        DB::table('admins')->where('id', $id)->delete();
        Alert::error('Successfully Delete Data', '');
        return redirect()-> route('listadmin');
    }

    public function get_chart_data(){
        $data_transaction = DB::select('SELECT MONTH(updated_at) AS bulan,COUNT(updated_at) AS jumlah FROM `transactions` WHERE `status` = "success" AND YEAR(updated_at)="2022" GROUP BY YEAR(updated_at), MONTH(updated_at)');
        $transaction = json_encode($data_transaction);
        return $transaction;
    }
    public function get_chart_data_year(){
        $year = [date('Y',strtotime('-2 year')),date('Y',strtotime('-1 year')),date('Y')];
        $data_transaction = DB::select('SELECT YEAR(updated_at) AS year,COUNT(updated_at) AS jumlah FROM `transactions` WHERE `status` = "success" AND (YEAR(updated_at)="'.$year[0].'" OR YEAR(updated_at)="'.$year[1].'" OR YEAR(updated_at)="'.$year[2].'") GROUP BY YEAR(updated_at)');
        $transaction = json_encode($data_transaction);
        return $transaction;
    }
}
