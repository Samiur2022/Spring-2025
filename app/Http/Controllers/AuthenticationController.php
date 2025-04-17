<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function loginPageView(){
        return view('login');
    }

    public function submit(Request $request){
       // dd($request->all());
       $credential = $request->except('_token');
       
       $check = Auth::attempt($credential);
       if ($check) {
        toastr()->title('Admin login')->success('Login successfully!');
        return redirect()->route('dashboard');
    } else {
        toastr()->title('Admin login')->error('Incorrect email or password');
        return redirect()->back();
    }
    
    }


    public function logout(){
        Auth::logout();
        toastr()->title('Admin Logout')->options(['progressBar' => false])->success('Logout successfully!');
        return redirect()->route('login');

    }
}
