<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Flight;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('backend.product.manage_product',compact('products'));
    }

    public function create(){
        $categories = Category::all();
        $brands     = Brand::all();
        return view('backend.product.add_product',compact('categories','brands'));
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),[
                'product_name'    =>    'required',
                'product_code'    =>    'required|min:3|max:10|unique:products,product_code,',
                'category_id'     =>    'required',
                'product_qty'     =>    'required|numeric|min:1',
                'product_price'   =>    'required|numeric|min:1',
                'product_cost'    =>    'required|numeric|min:1',
                'product_des'     =>    'required',
                'product_image'   =>    'required|image|max: 1024',
            ],[
                'product_name.required'     =>    'The product name must not be empty!',
                'product_code.required'     =>    'The product code must not be empty!',
                'product_code.min'          =>    'The product code minimum digit is 3!',
                'product_code.max'          =>    'The product code maximum digit is 10!',
                'product_code.unique'       =>    'The product code must be unique!',
                'category_id.required'      =>    'The category must be select!',
                'product_qty.required'      =>    'The opening stock must not be empty!',
                'product_qty.numeric'       =>    'The opening stock must be numeric value!',
                'product_price.required'    =>    'The product price must not be empty!',
                'product_price.numeric'     =>    'The product price must be numeric value!',
                'product_cost.required'     =>    'The product cost must not be empty!',
                'product_cost.numeric'      =>    'The product cost must be numeric value!',
                'product_des.required'      =>    'The product description must not be empty!',
                'product_image.required'    =>    'The product image must not be empty!',
                'product_image.image'       =>    'The product image only support jpg, jpeg, png, bmp, gif, svg, or webp!',
                'product_image.max'         =>    'The photo must not be greater then 1 MB!',
            ]);
            if ($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }

            $image    =     $request->file('product_image');
            $img_name =     "product_".time().".".$image->getClientOriginalExtension();
            $image->move('upload/products',$img_name);

            $inputs = [
                'product_name'    =>    $request->input('product_name'),
                'product_code'    =>    $request->input('product_code'),
                'category_id'     =>    $request->input('category_id'),
                'brand_id'        =>    $request->input('brand_id'),
                'product_qty'     =>    $request->input('product_qty'),
                'product_price'   =>    $request->input('product_price'),
                'product_cost'    =>    $request->input('product_cost'),
                'product_des'     =>    $request->input('product_des'),
                'product_image'   =>    $img_name,
            ];

            Product::create($inputs);
            Session::flash('message','Successfully! Product Added');
            Session::flash('alert','success');
            return redirect()->route('admin.add.product');
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }


    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        $categories = Category::all();
        $brands     = Brand::all();
        return view('backend.product.edit_product',compact('product','categories','brands'));
    }

    public function update(Request $request, $id){
        try {
            $validate = Validator::make($request->all(),[
                'product_name'    =>    'required',
                'product_code'    =>    'required|min:3|max:10|unique:products,product_code,'.$id,
                'category_id'     =>    'required',
                'product_qty'     =>    'required|numeric|min:1',
                'product_price'   =>    'required|numeric|min:1',
                'product_cost'    =>    'required|numeric|min:1',
                'product_des'     =>    'required',
                'product_image'   =>    'image|max: 1024',
            ],[
                'product_name.required'     =>    'The product name must not be empty!',
                'product_code.required'     =>    'The product code must not be empty!',
                'product_code.min'          =>    'The product code minimum digit is 3!',
                'product_code.max'          =>    'The product code maximum digit is 10!',
                'product_code.unique'       =>    'The product code must be unique!',
                'category_id.required'      =>    'The category must be select!',
                'product_qty.required'      =>    'The opening stock must not be empty!',
                'product_qty.numeric'       =>    'The opening stock must be numeric value!',
                'product_price.required'    =>    'The product price must not be empty!',
                'product_price.numeric'     =>    'The product price must be numeric value!',
                'product_cost.required'     =>    'The product cost must not be empty!',
                'product_cost.numeric'      =>    'The product cost must be numeric value!',
                'product_des.required'      =>    'The product description must not be empty!',
                'product_image.image'       =>    'The product image only support jpg, jpeg, png, bmp, gif, svg, or webp!',
                'product_image.max'         =>    'The photo must not be greater then 1 MB!',
            ]);
            if ($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }

            $product  =     Product::find($id);
            $image    =     $request->file('product_image');

            if ($image){
                $img_name =     "product_".time().".".$image->getClientOriginalExtension();

                if (file_exists('/upload/products/'.$product->product_image)){
                    unlink('/upload/products/'.$product->product_image);
                }
                $image->move('upload/products',$img_name);
                $inputs = [
                    'product_name'    =>    $request->input('product_name'),
                    'product_code'    =>    $request->input('product_code'),
                    'category_id'     =>    $request->input('category_id'),
                    'brand_id'        =>    $request->input('brand_id'),
                    'product_qty'     =>    $request->input('product_qty'),
                    'product_price'   =>    $request->input('product_price'),
                    'product_cost'    =>    $request->input('product_cost'),
                    'product_des'     =>    $request->input('product_des'),
                    'product_image'   =>    $img_name,
                ];
            }else{
                $inputs = [
                    'product_name'    =>    $request->input('product_name'),
                    'product_code'    =>    $request->input('product_code'),
                    'category_id'     =>    $request->input('category_id'),
                    'brand_id'        =>    $request->input('brand_id'),
                    'product_qty'     =>    $request->input('product_qty'),
                    'product_price'   =>    $request->input('product_price'),
                    'product_cost'    =>    $request->input('product_cost'),
                    'product_des'     =>    $request->input('product_des'),
                ];
            }
            $product->update($inputs);
            Session::flash('message','Product Update Successful!');
            Session::flash('alert','success');
            return redirect()->route('admin.product');
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }

    }

    public function delete($id){
        try {
            $product = Product::find($id);
            if (file_exists('/upload/products/'.$product->product_image)){
                unlink('/upload/products/'.$product->product_image);
            }
            Product::where('id',$id)->delete();
            Session::flash('message','Product Delete Successful');
            Session::flash('alert','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }


}
