<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('frontend.home',compact('categories'));
    }

    public function catShop($slug){
        $slug_exist = Category::where('slug','=',$slug)->first();
        if (empty($slug_exist)){
            return redirect()->route('shop');
        }else{
            $id = $slug_exist->id;
            $categories = Category::latest()->get();
            $brand     = Brand::orderBy('id','asc')->first();
            $products   = Product::where('category_id','=',$id)->latest()->paginate(12);
            $cat = [];
            foreach ($categories as $category){
                $cat[$category->slug] = Product::where('category_id','=',$category->id)->count();
            }
            return view('frontend.shop.index',compact('products','categories','brand','cat'));
        }

    }
}
