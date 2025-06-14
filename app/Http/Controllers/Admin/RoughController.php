<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoughController extends Controller
{
    public function index(){
        
 // try {
        //     $validatedData = $request->validate((new Store())->rules());
        //     dd($validatedData);
        //     return response()->json(['success' => true, 'data' => $validatedData]);

        // } catch (ValidationException $e) {
        //     return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        // }




        //  $validator = Validator::make($request->all(),[
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);


        // public function update1(Category $category){
        //     $category = Category::find($category->id);
        //     return $category;
    
        //     if (empty($category)) {
        //         session()->flash('success', 'Category not found!');
        //         return redirect()->route('categories.index');
        //     }
        // }

// dd($category->image);
// dd(isset($categories['image']));

// dd($category->image);


        // public function edit($id, Request $request){
    //     $category = Category::find($id);
    //     if (empty($category)) {
    //         return redirect()->route('categories.index');
    //     }
    //     return view('admin.category.dummy', compact('category'));
    // }

    }
}
