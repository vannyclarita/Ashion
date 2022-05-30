<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()){
             $notifications = auth()->user()->notifications;
        }
        return view('welcome', compact('notifications'));
    }

    public function indexadmin()
    {
        $notifications = DB::table('notifications')->where('notifiable_type', '=', 'App\Models\Admin')->get();
        return view('homeadmin', compact('notifications'));
    }
}
