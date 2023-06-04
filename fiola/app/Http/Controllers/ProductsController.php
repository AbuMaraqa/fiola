<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Manufacturers;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $data = Products::get();
        return view('admin.products.index',['data'=>$data]);
    }

    public function add(){
        $data = Manufacturers::get();
        return view('admin.products.add',['data'=>$data]);
    }

    public function create(ProductsRequest $request){
        $data = new Products();
        $data->product_name = $request->product_name;
        $data->product_barcode = $request->product_barcode;
        $data->product_manufacturer_id = $request->product_manufacturer_id;
        $data->product_status = 1;
        if ($request->hasFile('product_photo')){
            $the_file_path = uploadImage('uploads/',$request->product_photo);
            $data->product_photo = $the_file_path;
        }
        else{
            $data->product_photo = 'shoesIcon.png';
        }
        $data->product_description = $request->product_description;
        $data->product_tags = $request->product_tags;
        $data->product_notes = $request->product_notes;
        if ($data->save()){
            return redirect()->route('products.index')->with(['success'=>'تم اضافة البيانات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'هناك خلل ما'])->withInput();
        }
    }

    public function edit($id){
        $product = Products::find($id);
        $manufacturers = Manufacturers::get();
        return view('admin.products.edit',['product'=>$product,'manufacturers'=>$manufacturers]);
    }

    public function update(ProductsRequest $request){
        $data = Products::where(['id'=>$request->id])->first();
        $data->product_name = $request->product_name;
        $data->product_barcode = $request->product_barcode;
        $data->product_manufacturer_id = $request->product_manufacturer_id;
        if ($request->product_status == 'on'){
            $data->product_status = 1;
        }
        else{
            $data->product_status = 0;
        }
        if ($request->hasFile('product_photo')){
            $the_file_path = uploadImage('uploads/',$request->product_photo);
            $data->product_photo = $the_file_path;
        }
        $data->product_description = $request->product_description;
        $data->product_tags = $request->product_tags;
        $data->product_notes = $request->product_notes;
        if ($data->save()){
            return redirect()->route('products.index')->with(['success'=>'تم اضافة البيانات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'هناك خلل ما'])->withInput();
        }
    }

    public function details($id){
        $data['products'] = Products::where(['id'=>$id])->first();
        $data['products']['manufacturer'] = Manufacturers::where(['id'=>$data['products']->product_manufacturer_id])->first();
        return view('admin.products.details',['data'=>$data]);
    }
}
