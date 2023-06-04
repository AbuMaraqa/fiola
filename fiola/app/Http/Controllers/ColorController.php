<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $data = Color::get();
        return view('admin.colors.index',['data'=>$data]);
    }

    public function add(){
        return view('admin.colors.add');
    }

    public function create(ColorRequest $request){
        $data = new Color();
        $data->color_name = $request->color_name;
        if ($data->save()){
            return redirect()->route('colors.index')->with(['success'=>'تم اضافة البيانات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'لم يتم اضافة البيانات هناك خلل ما'])->withInput();
        }
    }

    public function edit($id){
        $data = Color::find($id);
        return view('admin.colors.edit',['data'=>$data]);
    }

    public function update(ColorRequest $request){
        $data = Color::find($request->id);
        $data->color_name = $request->color_name;
        if ($data->save()){
            return redirect()->route('colors.index')->with(['success'=>'تم تعديل الباينات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'لم يتم تعديل البيانات هناك خلل ما'])->withInput();
        }    }

    public function details($id){
        $data = Color::get();
        return view('admin.colors.index');
    }
}
