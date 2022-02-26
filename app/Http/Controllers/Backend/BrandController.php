<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Flight;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;
use function PHPUnit\Framework\fileExists;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::orderBy('id','desc')->paginate(10);
        return view('backend.brand.manage_brand',compact('brands'));
    }
    public function create(){
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.brand.add_brand',compact('brands'));
    }
    public function store(Request $request){

        try {
            $validate = Validator::make($request->all(),[
                'name' => 'required|max: 96|unique:brands,name',
                'photo' => 'required|image|max: 1024',
            ],[
                'photo.max' =>    'The photo must not be greater then 1 MB!',
            ]);
            if ($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }


            $image    =     $request->file('photo');
            $img_name =     "brand_".time().".".$image->getClientOriginalExtension();
            $image->move('upload/brands',$img_name);

            $inputs = [
                'name'    =>    $request->input('name'),
                'details' =>    $request->input('details'),
                'photo'   =>    $img_name,
            ];
            Brand::create($inputs);
            Session::flash('message','Successfully Brand Added!');
            Session::flash('alert','success');
            return redirect()->route('admin.add.brand');
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }

    public function edit($id){
//        $brand = Brand::find($id);
        $brand = Brand::where('id',$id)->first();
        return view('backend.brand.edit_brand',compact('brand'));
    }

    public function update(Request $request, $id){
//        dd($request->all());

        try {
            $validate = Validator::make($request->all(),[
                'name' => 'required|max: 96|unique:brands,name,'.$id,
                'photo' => 'image|max: 1024',
            ],[
                'photo.max' =>    'The photo must not be greater then 1 MB!',
                'details.required' =>    'The Description field is required',
            ]);
            if ($validate->fails()) {
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }
            $brand = Brand::find($id);
            $image    =     $request->file('photo');

            if ($image){
                $img_name =     "brand_".time().".".$image->getClientOriginalExtension();
                if (file_exists('/upload/brands/'.$brand->photo)){
                    unlink('/upload/brands/'.$brand->photo);
                }
                $image->move('upload/brands',$img_name);
                $inputs = [
                    'name'    =>    $request->input('name'),
                    'details' =>    $request->input('details'),
                    'photo'   =>    $img_name,
                ];
            }else{
                $inputs = [
                    'name'    =>    $request->input('name'),
                    'details' =>    $request->input('details'),
                ];
            }
            $brand->update($inputs);
            Session::flash('message','Brand, Update Successful');
            Session::flash('alert','success');
            return redirect()->route('admin.brand');
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }

    public function delete(Request $request, $id){
        try {
            $brand = Brand::find($id);
            if (file_exists('/upload/brands/'.$brand->photo)){
                unlink('/upload/brands/'.$brand->photo);
            }
            Brand::where('id',$id)->delete();
            Session::flash('message','Brand Delete Seccess');
            Session::flash('alert','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }

}
