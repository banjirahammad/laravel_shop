<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        try {
            $validate = Validator::make($request->all(),[
                'name' => 'required',
                'phone' => 'required|min:10|max:11',
                'email' => 'required|unique:users,email',
                'address' => 'required',
                'password' => 'required|min:6|max: 25',
            ],[
                'phone.required'    =>    'The photo number field must not be empty!',
                'phone.min'         =>    'Please enter correct phone number!',
                'phone.max'         =>    'Please enter correct phone number!',
                'address.required'  =>    'The address field is required',
                'password.required' =>    'The password field is required',
                'password.min'      =>    'The password more then 6 character',
            ]);
            if ($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }

            $inputs = [
                'name'      =>    $request->input('name'),
                'phone'     =>    $request->input('phone'),
                'email'     =>    $request->input('email'),
                'address'   =>    $request->input('address'),
                'password'  =>    Hash::make($request->input('password')),
            ];
            User::create($inputs);
            Session::flash('message','Congratulation, Registration Successful');
            Session::flash('alert','success');
            return redirect()->route('login');
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }


}
