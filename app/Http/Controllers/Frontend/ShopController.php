<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $products   = Product::orderBy('id','desc')->paginate(12);
        $categories = Category::orderBy('id','asc')->get();
        $brand     = Brand::orderBy('id','asc')->first();
        $cat = [];
        foreach ($categories as $category){
            $cat[$category->slug] = Product::where('category_id','=',$category->id)->count();
        }
        return view('frontend.shop.index',compact('products','categories','brand','cat'));
    }


}
