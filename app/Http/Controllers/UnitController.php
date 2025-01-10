<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }

    public function create(Request $request)
    {
    //     // testing
    //     return $request->all();
       Unit::newUnit($request);
       return back()->with('meassage','unit info create successfully.');
    }

    public function manage()
    {
         return view('admin.unit.manage',['units'=>Unit::all()]);
    }


    public function edit($id)
    {
         return view('admin.unit.edit',['unit' =>Unit::find($id),

        ]);
    }
    public function update(Request $request,$id)
    {
        Unit::updateUnit($request,$id);
       return redirect('/unit/manage')->with('meassage','Unit update successfully.');
    }
    public function delete(Request $request,$id)
    {
        Unit::deleteUnit($request,$id);
       return redirect('/unit/manage')->with('meassage',' Unit delete successfully.');
    }
}
