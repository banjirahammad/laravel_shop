<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Flight;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(){
        return view('frontend.customer.dashboard');
    }

    public function profile(){
        return view('frontend.customer.profile');
    }

    public function update(Request $request){

        try {
            $validate = Validator::make($request->all(),[
                'name'    => 'required',
                'phone'   => 'required|min:10|max:11',
                'address' => 'required',
                'photo'   => 'image|max: 1024',
            ],[
                'phone.required'    =>    'The photo number field must not be empty!',
                'phone.min'         =>    'Please enter correct phone number!',
                'phone.max'         =>    'Please enter correct phone number!',
                'address.required'  =>    'The address field is required',
                'photo.max'         =>    'The photo must not be greater then 1 MB!',
            ]);
            if ($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }

            $auth = auth()->user();
            $image    =     $request->file('photo');

            if ($image){
                $img_name =     "user_".time().".".$image->getClientOriginalExtension();
                if (file_exists('/upload/users/'.$auth->photo)){
                    unlink('/upload/users/'.$auth->photo);
                }
                $image->move('upload/users',$img_name);
                $inputs = [
                    'name'     =>    $request->input('name'),
                    'phone'    =>    $request->input('phone'),
                    'address'  =>    $request->input('address'),
                    'photo'    =>    $img_name,
                ];
            }else{
                $inputs = [
                    'name'     =>    $request->input('name'),
                    'phone'    =>    $request->input('phone'),
                    'address'  =>    $request->input('address'),
                ];
            }

            $auth->update($inputs);
            Session::flash('message','Successfully Profile Updated.');
            Session::flash('alert','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }

    public function orders(){
        $orders = Order::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();

        return view('frontend.customer.orders',compact('orders'));
    }

}
