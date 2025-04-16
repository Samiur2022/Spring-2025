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
        
       if($check){
        notify()->success('login Sucessfully');
        return redirect()->route('dashboard');
       }
       else{
        notify()->error('Incorrect email or password');
        return redirect()->back();
       }
    }


    public function logout(){
        Auth::logout();
        notify()->success('Successfully Logout');
        return redirect()->route('login');

    }
}
