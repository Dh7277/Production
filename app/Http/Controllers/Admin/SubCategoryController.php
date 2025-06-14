<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\Update;
use App\Http\Requests\SubCategory\Store;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(Request $request){
        $SubCategories = SubCategory::select('sub_categories.*', 'categories.name as categoryName')
                            ->orderBy('sub_categories.id', 'desc')
                            ->leftJoin('categories', 'categories.id', 'sub_categories.category_id');

        if(!empty($request->get('keyword'))){
            $SubCategories = $SubCategories->where('sub_categories.name', 'like', '%'. $request->get('keyword') .'%');
            $SubCategories = $SubCategories->orWhere('categories.name', 'like', '%'. $request->get('keyword') .'%');
        }
        $SubCategories = $SubCategories->paginate(10);
        return view('admin.sub_category.list', compact('SubCategories'));
    }
    
    public function create(){
        $categories = Category::orderBy('name', 'ASC')->get();

        if (isset($categories)){
            $data['categories'] = $categories;
            return view('admin.sub_category.create', $data);
        }   
    }

    public function store(Store $request){

        $subCategories = $request->validated();

        if(isset($subCategories)){
            $subCategory = new SubCategory();
            $subCategory->name = $request->name;
            $subCategory->slug = $request->slug;
            $subCategory->category_id = $request->category;
            $subCategory->status = $request->status;
            $subCategory->save();

            session()->flash('success', 'SubCategory created successfully!');
            return redirect()->route('sub-categories.index');

        }else{
            session()->flash('error', 'SubCategory not created!');
            return redirect()->route('categories.create');
        }
    }

    public function edit($id, Request $request){
        $subCategories = SubCategory::find($id);
        if(empty($subCategories)){
            session()->flash('error', 'SubCategory Not Found!');
            return redirect()->route('sub-categories.index');
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        $data['categories'] = $categories;
        $data['subCategories'] = $subCategories;
        return view('admin.sub_category.edit', $data);

    }

    public function update(Update $request, SubCategory $subCategory){

        $Existing = SubCategory::find($subCategory->id);

        if (empty($Existing)) {
            session()->flash('success', 'SubCategory not found!');
            return redirect()->route('sub-categories.index');
        }

        if(isset($request)){
            $Existing->category_id = $request->category ? $request->category : $Existing->category_id;
            $Existing->name = $request->name ? $request->name : $Existing->name;
            $Existing->slug = $request->slug ? $request->slug : $Existing->slug;
            $Existing->status = $request->status;
            $Existing->save();
        
            session()->flash('success', 'SubCategory updated successfully!');
            return redirect()->route('sub-categories.index');

        }else{
            session()->flash('error', 'SubCategory not updated!');
            return redirect()->route('sub-categories.index');
        }
    }

    public function destroy($id){
        
        $subCategory = SubCategory::find($id);
        
        if (empty($subCategory)) {
            session()->flash('error', 'SubCategory not found!');
            return redirect()->route('sub-categories.index');
        }
        $subCategory->delete();
        return redirect()->route('sub-categories.index')->with('success', 'SubCategory deleted successfully.');
    }


}
