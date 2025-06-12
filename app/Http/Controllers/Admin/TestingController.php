<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    Public function testing(Request $request){
        $data = [];
        return view('admin.testing', $data);
    }

     Public function login(Request $request){
        $data = [];
        return view('login', $data);
    }
}
