<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\Store;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.layouts.login_layout');
    }

    public function authenticate(Store $request){
        $validator = $request->validated();

        if(isset($validator)){
            /*This below if condition line will authenticate the user 
            who try for the login with valid credentials*/

            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' =>  
            $request->password], $request->get('remember'))){  

                $admin = Auth::guard('admin')->user();

                if($admin->role == 2){
                    
                    return redirect()->route('admin.dashboard');

                }else{

                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'You can not access Admin Panel.');

                }

            }else{

                return redirect()->route('admin.login')->with('error', 'Either Email/Password is incorrect.');
            }
        }else{  
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }

    
}
