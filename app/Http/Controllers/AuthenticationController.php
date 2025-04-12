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
        return redirect()->route('dashboard');
       }
       else{
        return redirect()->back();
       }
    }
}
