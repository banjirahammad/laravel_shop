<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    //order index
    public function index(){
        $orders = Order::orderBy('id','desc')->paginate(10);
        return view('backend.orders.index',compact('orders'));
    }

    //single order view
    public function orderView($id){
        $order      =   Order::where('id',$id)->with('user')->first();
        $products   =   OrderDetail::where('order_id',$id)->with('order')->get();
        Order::where('id','=',$id)->update([
            'seen'=>1
        ]);
        return view('backend.orders.order_view',compact('products','order'));
    }

    //order delete
    public function orderDelete($id){
        try {
            DB::beginTransaction();
            Order::where('id',$id)->delete();
            OrderDetail::where('order_id',$id)->delete();
            DB::commit();
            Alert::toast('Order Delete Successful', 'success');
            return redirect()->back();

        }catch (\Exception $exception){
            DB::rollBack();
            Alert::toast($exception->getMessage(), 'danger');
            return redirect()->back();
        }
    }

    //order status update
    public function orderStatus(Request $request){
        $id = $request->order_id;
        $status = $request->status;
        Order::where('id',$id)->update([
            'status'=>$status,
        ]);
        Alert::toast('Status Update Successful', 'success');
        return redirect()->back();
    }



}
