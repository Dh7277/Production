<?php

namespace App\Http\Controllers\Admin1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestingController1 extends Controller
{
    Public function testing(Request $request){
        $data = [];
        return view('admin.testing', $data);
    }

     Public function login(Request $request){
        $data = [];
        return view('login', $data);
    }

     Public function loginHtml(Request $request){
         return response()->file(public_path('login.html'));
    }

}
