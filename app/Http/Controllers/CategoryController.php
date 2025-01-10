<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function manage()
    {
        // $categories =Category::all();
        // return view('admin.category.manage',compact('categories'));
        // return view('admin.category.manage')->with('categories',Category::all());
        // return view('admin.category.manage',['categories'=>DB::table('categories')->get()]);
         return view('admin.category.manage',['categories'=>Category::all()]);
    }

    // useing quary builder...method..for image.
    // public static function getImageUrl($request)
    // {
    //     $image     = $request->file('image');
    //     $imageName =$image->getClientOriginalName();
    //     $directory = 'upload/category-image/';
    //     $image ->move($directory,$imageName);
    //     $imageUrl =$directory.$imageName;
    //     return $imageUrl;

    // }

    public function create(Request $request)
    {
        // testing
        // return $request->all();
        // return $request->file('image')->getClientOriginalName();
       Category::newCategory($request);
       return back()->with('meassage','Category create successfully love.');

        // for the protected function
        // Category::created($request->except('image'));

    // ....quary builder method
    //    DB::table('categories')->insert([
    //         'name'        =>$request->name,
    //         'description' =>$request->description,
    //         'image'       =>$this->getImageUrl($request),
    //         'status'      =>$request->status,

    //   ]);
    // return $request->all();

    }

    public function edit($id)
    {
         return view('admin.category.edit',['category'=>Category::find($id)]);
    }
    public function update(Request $request,$id)
    {
       Category::updateCategory($request,$id);
       return redirect('/category/manage')->with('meassage','Category update successfully.');
    }
    public function delete(Request $request,$id)
    {
       Category::deleteCategory($request,$id);
       return redirect('/category/manage')->with('meassage','Category delete successfully.');
    }
}
