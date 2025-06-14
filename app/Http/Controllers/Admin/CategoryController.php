<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Destroy;
use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\CategoryService;
use Exception;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request){
        $categories = Category::orderBy('id', 'desc');

        if(!empty($request->get('keyword'))){
            $categories = $categories->where('name', 'like', '%'. $request->get('keyword') .'%');
        }
        $categories = $categories->paginate(10);
        return view('admin.category.list', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Store $request){
        $categories = $request->validated();

        if(isset($categories)){
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;

            if(isset($request->image)){
                $ext = $request->file('image')->getClientOriginalExtension();
                $newName = time().'.'.$ext;
                $path = $request->file('image')->storeAs('images', $newName, 'public');
                $category->image = '/storage/'.$path;
            }else{
               $category->image = Null;
            }

            $category->status = $request->status;
            $category->save();

            session()->flash('success', 'Category created successfully!');
            return redirect()->route('categories.index');

        }else{
            session()->flash('error', 'Category not created!');
            return redirect()->route('categories.create');
        }
    }

    public function edit(Category $category){

        return view('admin.category.edit', compact('category'));
    }
    
    public function update(Update $request, Category $category){

        $category = Category::find($category->id);

        if (empty($category)) {
            session()->flash('success', 'Category not found!');
            return redirect()->route('categories.index');
        }

        $categories = $request->validated();
        $oldImage = $category->image;

        if(isset($categories)){
            $category->name = $request->name ? $request->name : $category->name;
            $category->slug = $request->slug ? $request->slug : $category->slug;

            if(isset($request->image)){
                $ext = $request->file('image')->getClientOriginalExtension();
                $newName = time().'.'.$ext;
                $path = $request->file('image')->storeAs('images', $newName, 'public');
                $category->image = '/storage/'.$path; 

                //Delete old image if new image coming
                File::delete(public_path().$oldImage);
            }else{
               $category->image = $category->image;
            }

            $category->status = $request->status;
            $category->save();

            

            session()->flash('success', 'Category updated successfully!');
            return redirect()->route('categories.index');

        }else{
            session()->flash('error', 'Category not created!');
            return redirect()->route('categories.index');
        }
    }

    public function destroyPage(Category $category){
        return view('admin.category.destroy', compact('category'));
    }

    public function destroy(Request $request, Category $category){
        try {
            $category = Category::find($category->id);

            if(empty($category)){
                return redirect()->route('categories.index');
            }

            File::delete(public_path().$category->image);
            $category->delete();

            session()->flash('success', 'Category deleted successfully!');
            return redirect()->route('categories.index');

        } catch (Exception $exception) {
            dd($exception);
        }
    }
}
