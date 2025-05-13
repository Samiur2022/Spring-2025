<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerAuthController extends Controller
{
     public function viewRegForm()
    {
        return view('Forntend.registration');
    }

    public function regStoreForm(Request $request)
    {

        // dd($request->all());

        $validation = Validator::make($request->all(), [
            'fullName' => 'required|string',
            'userName' => 'required|string|max:10',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required'
        ]);

        if ($validation->fails()) {
            toastr()->title('Customer Registration')->options(['progressBar' => false])
                ->error($validation->getMessageBag());

            return redirect()->back();
        }

        //query

        Customer::create([
            'name' => $request->userName,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'gender' => $request->gender
        ]);

        toastr()->title('Customer Registration')->options(['progressBar' => false])
            ->success('Registration Done');

        return redirect()->route('customer.login');
    }

    public function viewLogForm()
    {

        return view('Forntend.login');
    }

    public function logStoreForm(Request $request)
    {
      //  dd($request->all());

        // validation


        $validation = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);

        if ($validation->fails()) {
            toastr()->title('Customer Registration')->options(['progressBar' => false])
                ->error($validation->getMessageBag());

            return redirect()->back();
        }

        $credential = $request->except('_token');

        $check = Auth::guard('customer')->attempt($credential);
        if ($check) {
            toastr()->title('Customer login')->success('Login successfully!');
            return redirect()->route('check.out');
        } else {
            toastr()->title('Customer login')->error('Incorrect email or password');
            return redirect()->back();
        }
    }
}
