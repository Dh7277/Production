<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard');
        // $admin = Auth::guard('admin')->user();
        // echo 'Hello ' .$admin->name.' <a href= "'.route('admin.logout').'"> Logout </a>';
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
