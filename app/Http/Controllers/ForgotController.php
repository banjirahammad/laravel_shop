<?php

namespace App\Http\Controllers;

use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ForgotController extends Controller
{
    //forget controller
    public function index(){
        return view('auth.forgot');
    }

    public function forgot(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email'
        ]);
        if ($validate->fails()){
            return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
        }
        $data = [
            'email'=>$request->email,
            'token'=>Str::random(50)
        ];
        $email_exist = User::Where('email','=',$data['email'])->first();
        if ($email_exist){
            ResetPassword::create([
                'email'=>$data['email'],
                'token'=>$data['token'],
            ]);
            Mail::send('auth.mail',$data,function ($message) use($data){
                $message->from('banjirahammad@gmail.com','aspara');
                $message->to($data['email']);
                $message->subject('Forget Password');
            });
            Session::flash('message','I will send a verification link in your email. Please check your email!');
            Session::flash('alert','success');
            return redirect()->route('login');
        }else{
            Session::flash('message','Your email do not match our system! Please provide correct email');
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }

    public function updateView($token){
        if (ResetPassword::Where('token','=',$token)->first()){
            return view('auth.update',compact('token'));
        }
        Alert::toast('Your url and token is invalid!','error');
        return redirect()->route('login');
    }

    public function updatePassword(Request $request,$token){

        $validate = Validator::make($request->all(),[
            'password' => 'required|max:20|min:5|confirmed'
        ]);

        if ($validate->fails()){
            return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
        }
        $check = ResetPassword::Where('token','=',$token)->first();
        if ($check){
            $email = $check->email;
            $user_check = User::Where('email','=',$email)->first();
            if ($user_check){
                User::find($user_check->id)->Update([
                    'password'=>Hash::make($request->password)
                ]);

                ResetPassword::Where('email','=',$email)->delete();

                Alert::toast('Your Password is Updated! Please login');
                return redirect()->route('login');

            }
            Alert::toast('User email not found!');
            return redirect()->route('login');
        }
        Alert::toast('Something Wrong! Please login');
        return redirect()->route('login');
    }
}
