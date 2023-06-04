<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $data = Categories::get();
        foreach ($data as $key){
            $key->cat = Categories::where(['id'=>$key->parent_id])->first();
        }
        return view('admin.categories.index',['data'=>$data]);
    }

    public function add(){
        $data = Categories::get();
        return view('admin.categories.add',['data'=>$data]);
    }

    public function create(CategoriesRequest $request){
        $data = new Categories();
        $data->categories_name = $request->categories_name;
        $data->parent_id = $request->parent_id;
        if ($data->save()){
            return redirect()->route('categories.index')->with(['success'=>'تم اضافة البيانات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'هناك خلل لم يتم اضافة البيانات'])->withInput();
        }
    }

    public function edit($id){
        $data = Categories::find($id);
        $data['cat'] = Categories::get();
        return view('admin.categories.edit',['data'=>$data]);
    }

    public function update(CategoriesRequest $request){
        $data = Categories::find($request->id);
        $data->categories_name = $request->categories_name;
        $data->parent_id = $request->parent_id;
        if ($data->save()){
            return redirect()->route('categories.index')->with(['success'=>'تم تعديل البيانات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'هناك خلل لم يتم اضافة البيانات'])->withInput();
        }
    }
}
