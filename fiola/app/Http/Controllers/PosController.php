<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosRequest;
use App\Models\Pos;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(){
        $data = Pos::get();
        return view('admin.pos.index',['data'=>$data]);
    }

    public function add(){
        return view('admin.pos.add');
    }

    public function create(PosRequest $request){
        $data = new Pos();
        $data->pos_name = $request->pos_name;
        $data->pos_address = $request->pos_address;
        $data->pos_phone = $request->pos_phone;
        $data->pos_type = $request->pos_type;
        if ($data->save()){
            return redirect()->route('pos.index')->with(['success'=>'تم حفظ البيانات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'لم يتم الحفظ هناك خلل ما'])->withInput();
        }
    }

    public function edit($id){
        $data = Pos::find($id);
        return view('admin.pos.edit',['data'=>$data]);
    }

    public function update(PosRequest $request){
        $data = Pos::find($request->id);
        $data->pos_name = $request->pos_name;
        $data->pos_address = $request->pos_address;
        $data->pos_phone = $request->pos_phone;
        $data->pos_type = $request->pos_type;
        if ($data->save()){
            return redirect()->route('pos.index')->with(['success'=>'تم حفظ البيانات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'لم يتم الحفظ هناك خلل ما'])->withInput();
        }
    }

    public function details($id){
        $data = Pos::find($id);
        return view('admin.pos.details',['data'=>$data]);
    }
}
