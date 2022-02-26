<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderView($id){
        $order = Order::where('id',$id)->with('details')->first();
        return view('frontend.customer.order_details',compact('order'));
    }
}
