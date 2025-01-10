<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index',['categories'=>Category::all()]);
    }

    public function create(Request $request)
    {
    //     // testing
    //     return $request->all();
       SubCategory::newSubCategory($request);
       return back()->with('meassage','Sub category create successfully.');
    }

    public function manage()
    {
         return view('admin.sub-category.manage',['sub_categories'=>SubCategory::all()]);
    }


    public function edit($id)
    {
         return view('admin.sub-category.edit',['categories'=>Category::all(),
         'sub_category' =>SubCategory::find($id),

        ]);
    }
    public function update(Request $request,$id)
    {
        SubCategory::updateSubCategory($request,$id);
       return redirect('/sub-category/manage')->with('meassage','Sub category update successfully.');
    }
    public function delete(Request $request,$id)
    {
        SubCategory::deleteSubCategory($request,$id);
       return redirect('/sub-category/manage')->with('meassage','Sub category delete successfully.');
    }
}
