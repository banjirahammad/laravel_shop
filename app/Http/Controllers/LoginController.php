<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'email'     =>   'required|email',
            'password'  =>   'required',
        ],[
            'email.required'    =>    'The Email field is required!',
            'email.email'       =>    'Sorry! your email is not correct!',
            'password.required' =>    'The Password field is required',
        ]);
        if ($validate->fails()){
            return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
        }

        $creds      =   $request->except('_token');

//        if (\auth()->attempt($creds)){
//            if (\auth()->user()->role == 1){
//                return redirect()->route('admin.dashboard');
//            }else{
//                return redirect()->route('home');
//            }
//        }else{
//            return redirect()->back();
//        }

        if (Auth::attempt($creds)){
            if (Auth::user()->role == 1){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('home');
            }
        }else{
            Session::flash('message','Email and Password is wrong!');
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect(){
        $user = Socialite::driver('facebook')->user();
        $userFind = User::where('client_id',$user->id)->first();
        if ($userFind){
            Auth::login($userFind);
            return redirect()->route('customer.dashboard');
        }else{
            $userCreate = User::create([
                'name'  =>  $user->name,
                'email'  => $user->email,
                'phone'  =>  '',
                'address'  =>  '',
                'client_id'  =>  $user->id,
                'password'  =>  Hash::make('123456'),
            ]);
            if ($userCreate){
                Auth::login($userCreate);
                return redirect()->route('customer.dashboard');
            }else{
                return redirect('home');
            }


        }

    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect(){
        $user = Socialite::driver('google')->user();
        $userFind = User::where('client_id',$user->id)->first();
        if ($userFind){
            Auth::login($userFind);
            return redirect()->route('customer.dashboard');
        }else{
            $userCreate = User::create([
                'name'  =>  $user->name,
                'email'  => $user->email,
                'phone'  =>  '',
                'address'  =>  '',
                'client_id'  =>  $user->id,
                'password'  =>  Hash::make('123456'),
            ]);
            if ($userCreate){
                Auth::login($userCreate);
                return redirect()->route('customer.dashboard');
            }else{
                return redirect('home');
            }


        }

    }


}
