<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller{
    public function showLoginPage(){
        return view('auth.admin_login');
    }

    // TODO: If already login or logout??
    public function login(LoginRequest $request){
        include_once "../app/CustomSetting/conf.php";
        $credentials = $request -> validated();
        $credentials = $request -> safe() -> only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect() -> intended(route('admin-index'))
                    -> withSuccess($message['login_success']);
        }
        return redirect() -> route('admin-go-login') -> withSuccess($message['login_failed']);
    }

    public function logout() {
        include_once "../app/CustomSetting/conf.php";
        Session::flush();
        Auth::logout();
  
        return redirect() -> route('index') -> withSuccess($message['logout_success']);
    }
}


