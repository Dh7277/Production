<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin1\TestingController1;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/testing', [TestingController1::class, 'testing'])->name('testing.test');
    // Route::get('/login', [TestingController1::class, 'login'])->name('login.test');    
    Route::get('/loginHtml', [TestingController1::class, 'loginHtml'])->name('loginHtml.test');    

});


Route::group(['prefix' => 'admin'], function(){

    Route::group(['middleware' => 'admin.guest'],function(){

        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login'); //
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');//done

    });  

    // Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');//
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');//done

        Route::get('/form', [FormController::class, 'index'])->name('admin.form');//

        //Categories routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');//
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');//
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');//done
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');//done
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');//done
        Route::get('/categories/{category}/destroy', [CategoryController::class, 'destroyPage'])->name('categories.destroyPage');//done
        Route::put('/category/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');//done

        //SubCategory routes
        Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories.index');//done
        Route::get('/sub-categories/create', [SubCategoryController::class, 'create'])->name('sub-categories.create');//done
        Route::post('/sub-categories/store', [SubCategoryController::class, 'store'])->name('sub-categories.store');//done
        Route::get('/sub-categories/{subCategory}/edit', [SubCategoryController::class, 'edit'])->name('sub-categories.edit');//done
        Route::put('/sub-categories/{subCategory}', [SubCategoryController::class, 'update'])->name('sub-categories.update');//done
        Route::delete('/sub-categories/{category}', [SubCategoryController::class, 'destroy'])->name('sub-categories.destroy');//done

        //Brand routes
        Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');//done
        Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');//done
        Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');//done
        Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');//done
        Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');//done
        Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');//done

        //Product routes
        Route::get('/products', [ProductController::class, 'create'])->name('products.create');//done

    // });
 
});

