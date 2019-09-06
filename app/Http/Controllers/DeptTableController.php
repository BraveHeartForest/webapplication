<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeptTable;

class DeptTableController extends Controller
{
    public function add(Request $request)
    {
        $dept = DeptTable::orderBy('dept_id','asc')->paginate(10);
        return view('admin.dept',['dept_data'=>$dept]);
    }

    public function create(Request $request)
    {
        $this->validate($request,DeptTable::$rules,DeptTable::$message);
        $emp=new DeptTable;
        $form = $request->all();
        unset($form['_token']);
        $emp->fill($form)->save();
        return redirect('/dept')->with('form',$form);
    }
}
