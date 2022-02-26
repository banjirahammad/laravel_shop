<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Flight;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->paginate(10);
        return view('backend.category.manage_category',compact('categories'));
    }
    public function create(){
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.category.add_category',compact('categories'));
    }
    public function store(Request $request){
//        dd($request->all());
//        $request->validate([
//            'name' => 'required|max: 96',
//            'details' => 'required',
//            'status' => 'required',
//            'photo' => 'required|image|max: 1024',
//        ],[
//            'photo.max' =>    'The photo must not be greater then 1 MB!',
//        ]);

        try {
            $validate = Validator::make($request->all(),[
                'name' => 'required|max: 96|unique:categories,name',
                'details' => 'required',
                'status' => 'required',
                'photo' => 'required|image|max: 1024',
            ],[
                'photo.max' =>    'The photo must not be greater then 1 MB!',
                'details.required' =>    'The Description field is required',
            ]);
            if ($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }


            $image    =     $request->file('photo');
            $img_name =     "category_".time().".".$image->getClientOriginalExtension();
            $image->move('upload/categories',$img_name);

            $inputs = [
                'name'    =>    $request->input('name'),
                'slug'    =>    Str::slug($request->name,'-'),
                'details' =>    $request->input('details'),
                'status'  =>    $request->input('status'),
                'photo'   =>    $img_name,
            ];
            Category::create($inputs);
            Session::flash('message','Category Added Successful!');
            Session::flash('alert','success');
            return redirect()->route('admin.add.category');
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','success');
            return redirect()->route('admin.add.category');
        }
    }

    public function edit($id){
//        $category = Category::find($id);
        $category = Category::where('id',$id)->first();
        return view('backend.category.edit_category',compact('category'));
    }

    public function update(Request $request, $id){
//        dd($request->all());

        try {
            $validate = Validator::make($request->all(),[
                'name' => 'required|max: 96|unique:categories,name,'.$id,
                'details' => 'required',
                'status' => 'required',
                'photo' => 'image|max: 1024',
            ],[
                'photo.max' =>    'The photo must not be greater then 1 MB!',
                'details.required' =>    'The Description field is required',
            ]);
            if ($validate->fails()) {
                return redirect()->back()->withInput()->withErrors($validate->getMessageBag());
            }
            $category = Category::find($id);
            $image    =     $request->file('photo');

            if ($image){
                $img_name =     "category_".time().".".$image->getClientOriginalExtension();
                if (file_exists('/upload/categories/'.$category->photo)){
                    unlink('/upload/categories/'.$category->photo);
                }
                $image->move('upload/categories',$img_name);
                $inputs = [
                    'name'    =>    $request->input('name'),
                    'details' =>    $request->input('details'),
                    'status'  =>    $request->input('status'),
                    'photo'   =>    $img_name,
                ];
            }else{
                $inputs = [
                    'name'    =>    $request->input('name'),
                    'details' =>    $request->input('details'),
                    'status'  =>    $request->input('status'),
                ];
            }
            $category->update($inputs);
            Session::flash('message','Category Update Successful!');
            Session::flash('alert','success');
            return redirect()->route('admin.category');
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }

    public function delete(Request $request, $id){
        try {
            $category = Category::find($id);
            if (file_exists('/upload/categories/'.$category->photo)){
                unlink('/upload/categories/'.$category->photo);
            }
            Category::where('id',$id)->delete();
            Session::flash('message','Category Delete Success!');
            Session::flash('alert','success');
            return redirect()->back();
        }catch (\Exception $exception){
            Session::flash('message',$exception->getMessage());
            Session::flash('alert','danger');
            return redirect()->back();
        }
    }

}
