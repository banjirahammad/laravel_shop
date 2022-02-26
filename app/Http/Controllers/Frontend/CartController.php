<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function addToCart($id){
        $product = Product::find($id);

        $cart = \session()->has('cart') ? \session()->get('cart') : [];

//        if (\session()->has('cart')) {
//            $cart = \session()->get('cart');
//        }else {
//            $cart = [];
//        }

        if (key_exists($product->id, $cart)){
            $cart[$product->id]['qty'] = $cart[$product->id]['qty']+1;
        }else{
            $cart [$product->id] = [
                'product_id' =>  $product->id,
                'name'       =>  $product->product_name,
                'image'      =>  $product->product_image,
                'price'      =>  $product->product_price,
                'qty'        =>  1,
            ];
        }

        \session(['cart'=>$cart]);
//        Session::flash('message','Product added to cart');
//        Session::flash('alert','success');
        Alert::toast('Successfully added to cart', 'success');
        return redirect()->back();
    }

    public function cart(){
        $carts = \session()->has('cart') ? \session()->get('cart') : [];

        if ($carts == null){
            Session::flash('message','Empty Cart');
            Session::flash('alert','danger');
            return view('frontend.cart');
        }else{
            return view('frontend.cart',compact('carts'));
        }
    }

    public function deleteItem($id){
        $carts = \session()->has('cart') ? \session()->get('cart') : [];
        foreach ($carts as $key => $cart){
            if ($cart['product_id']==$id){
                unset($carts[$key]);
            }
            session(['cart'=>$carts]);
            Alert::toast('Successfully Delete to cart','success');
        }

        return redirect()->back();

    }

    public function order(Request $request){

        try {
            $validate = Validator::make($request->all(),[
                'name'    => 'required',
                'phone'   => 'required|min:10|max:11',
                'area'    => 'required|nullable',
                'address' => 'required',
                'pay_method'    => 'required|nullable',
                'trx_id'  => 'required|nullable|unique:orders,trx_id',
            ],[
                'phone.required'    =>    'The photo number field must not be empty!',
                'phone.min'         =>    'Please enter correct phone number!',
                'phone.max'         =>    'Please enter correct phone number!',
                'address.required'  =>    'The address field is required',
                'trx_id.required'   =>    'The TrxId field is required',
            ]);
            if ($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }
            $auth = auth()->user();
            $inputs = [
                'user_id'   => $auth->id,
                'user_name' => $request->name,
                'area'      => $request->area,
                'address'   => $request->address,
                'phone'     => $request->phone,
                'email'     => $auth->email,
                'price'     => $request->price,
                'qty'       => $request->qty,
                'status'    => 'Pending',
                'pay_method'=> $request->pay_method,
                'trx_id'    => $request->trx_id,
            ];

            DB::beginTransaction();
            $order = Order::create($inputs);
            $carts = \session()->has('cart') ? \session()->get('cart') : [];
            foreach ($carts as $cart){
                OrderDetail::create([
                    'order_id' =>   $order->id,
                    'product_id'    =>  $cart['product_id'],
                    'name'    =>  $cart['name'],
                    'price'    =>  $cart['price'],
                    'qty'    =>  $cart['qty']
                ]);
            }
            DB::commit();
            \session()->forget('cart');
            Session::flash('message','Order Successful');
            Session::flash('alert','danger');
            return redirect()->route('customer.dashboard');
        }catch (\Exception $exception){
            DB::rollBack();
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }

    }

    public function checkout(){
        $carts = \session()->has('cart') ? \session()->get('cart') : [];

        if ($carts == null){
//            Session::flash('message','Empty Cart');
//            Session::flash('alert','danger')
            return view('frontend.checkout',compact('carts'));
        }else{
            return view('frontend.checkout',compact('carts'));
        }
    }

}
