<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TestingController;

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
    Route::get('/testing', [TestingController::class, 'testing'])->name('testing.test');
    Route::get('/login', [TestingController::class, 'login'])->name('login.test');    
    Route::get('/loginHtml', [TestingController::class, 'loginHtml'])->name('loginHtml.test');    

});
