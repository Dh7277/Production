<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    Public function create(Request $request){
        $data = [];
        return view('admin.createproduct', $data  );
    }
}
