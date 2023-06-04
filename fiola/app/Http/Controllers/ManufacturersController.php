<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufacturersRequest;
use App\Models\Manufacturers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManufacturersController extends Controller
{
    public function index(){
        $data = Manufacturers::get();
        return view('admin.manufacturers.index',['data'=>$data]);
    }

    public function add(){
        return view('admin.manufacturers.add');
    }

    public function create(ManufacturersRequest $request){
        $data = new Manufacturers();
        $data->manufacturers_name = $request->manufacturers_name;

        $old_Photo_Path = $data->manufacturers_logo;
        if ($request->hasFile('manufacturers_logo')){
            $the_file_path = uploadImage('uploads/',$request->manufacturers_logo);
//                echo $the_file_path;
            $data->manufacturers_logo = $the_file_path;

            $filePath = public_path('storage/uploads/'.$data->manufacturers_logo);

            // REMOVE OLD PHOTO
//            if (File::exists($filePath)) {
//                File::delete($filePath);
//            }

//            if (file_exists('public/storage/uploads/'.$old_Photo_Path)){
//                unlink('public/storage/uploads/'.$old_Photo_Path);
//            }
        }
        if ($data->save()){
            return redirect()->route('manufacturers.index')->with(['success'=>'تم اضافة البيانات بنحاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'لم يتم اضافة الباينات هناك خلل ما'])->withInput();
        }
    }

    public function edit($id){
        $data = Manufacturers::find($id);
        return view('admin.manufacturers.edit',['data'=>$data]);
    }

    public function update(ManufacturersRequest $request){
        $data = Manufacturers::where(['id'=>$request->id])->first();
        $data->manufacturers_name = $request->manufacturers_name;
        if ($request->hasFile('manufacturers_logo')){
            $the_file_path = uploadImage('uploads/',$request->manufacturers_logo);
//                echo $the_file_path;
            $data->manufacturers_logo = $the_file_path;

            $filePath = public_path('storage/uploads/'.$data->manufacturers_logo);

            // REMOVE OLD PHOTO
//            if (File::exists($filePath)) {
//                File::delete($filePath);
//            }

//            if (file_exists('public/storage/uploads/'.$old_Photo_Path)){
//                unlink('public/storage/uploads/'.$old_Photo_Path);
//            }
        }
        if ($data->save()){
            return redirect()->route('manufacturers.index')->with(['success'=>'تم اضافة البيانات بنحاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'لم يتم اضافة الباينات هناك خلل ما'])->withInput();
        }
    }
}
