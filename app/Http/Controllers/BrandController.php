<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function create(Request $request)
    {
    //     // testing
    //     return $request->all();
       Brand::newBrand($request);
       return back()->with('meassage','Brand info create successfully.');
    }

    public function manage()
    {
         return view('admin.brand.manage',['brands'=>Brand::all()]);
    }


    public function edit($id)
    {
         return view('admin.brand.edit',['brand' =>Brand::find($id),

        ]);
    }
    public function update(Request $request,$id)
    {
        Brand::updateBrand($request,$id);
       return redirect('/brand/manage')->with('meassage','brand update successfully.');
    }
    public function delete(Request $request,$id)
    {
        Brand::deleteBrand($request,$id);
       return redirect('/brand/manage')->with('meassage',' brand delete successfully.');
    }
}
