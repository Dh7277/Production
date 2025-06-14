<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\Store;
use App\Http\Requests\Brands\Update;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request){
        $brands = Brand::orderBy('id', 'desc');

        if(!empty($request->get('keyword'))){
            $brands = $brands->where('name', 'like', '%'. $request->get('keyword') .'%');
        }
        $brands = $brands->paginate(10);
        return view('admin.brands.list', compact('brands'));
    }

    public function create(){
        return view('admin.brands.create');
    }

    public function store(Store $request){

        $brand = $request->validated();

        if(isset($brand)){
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->status = $request->status;
            $brand->save();

            session()->flash('success', 'Brand created successfully!');
            return redirect()->route('brands.index');

        }else{
            session()->flash('error', 'Brand not created!');
            return redirect()->route('brands.create');
        }
    }

    public function edit(Brand $brand){

        return view('admin.brands.edit', compact('brand'));
    }
    

    public function update(Update $request, Brand $brand){

        $Existing = Brand::find($brand->id);

        if (empty($Existing)) {
            session()->flash('success', 'Brand not found!');
            return redirect()->route('brands.index');
        }

        if(isset($request)){
            $Existing->name = $request->name ? $request->name : $Existing->name;
            $Existing->slug = $request->slug ? $request->slug : $Existing->slug;
            $Existing->status = $request->status;
            $Existing->save();
        
            session()->flash('success', 'Brand updated successfully!');
            return redirect()->route('brands.index');

        }else{
            session()->flash('error', 'Brand not updated!');
            return redirect()->route('brands.index');
        }
    }

    public function destroy($id){

        $brands = Brand::find($id);

        if (empty($brands)) {
            session()->flash('error', 'Brand not found!');
            return redirect()->route('brands.index');
        }

        $brands->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
