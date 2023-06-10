<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoicesRequest;
use App\Models\Color;
use App\Models\InvoiceItems;
use App\Models\Invoices;
use App\Models\Pos;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index(){
        $data = Invoices::where(['invoices_type'=>2])->get();
        foreach ($data as $key){
            $key->user = User::where(['id'=>$key->user_id])->first();
            $key->inventory = Pos::where(['id'=>$key->inventory_id])->first();
            $key->added_by = User::where(['id'=>$key->added_by])->first();
        }
        return view('admin.purchases.index',['data'=>$data]);
    }

    public function details($id){
        $data['invoices'] = Invoices::where(['id'=>$id])->first();
        $data['users'] = User::where('role',4)->orWhere('role',5)->first();
        $data['inventory'] = Pos::where('id',$data['invoices']->inventory_id)->get();
        $data['invoice_id'] = $id;
        $data['product'] = Products::get();
        $data['colors'] = Color::get();
        $data['added_by'] = User::where('id',$data['invoices']->added_by)->first();
        $invoice_item = InvoiceItems::where('invoice_id',$id)->get();
        foreach ($invoice_item as $key){
            $key->items = Products::where('id',$key->product_id)->first();
            $key->colors = Color::where('id',$key->color_id)->first();
        }
//        return $invoice_item;

        return view('admin.purchases.details',['data'=>$data,'invoice_item'=>$invoice_item]);
    }

    public function edit($id){
        $data = Invoices::where('id',$id)->first();
        $users = User::where('role',3)->orWhere('role',4)->get();
        $inventory = Pos::get();
        return view('admin.purchases.edit',['data'=>$data,'users'=>$users,'inventory'=>$inventory]);
    }

    public function update(InvoicesRequest $request){
        $data = Invoices::where(['id'=>$request->id])->first();
        $data->user_id = $request->user_id;
        $data->inventory_id = $request->inventory_id;
        if ($data->save()){
            return redirect()->route('purchases.index')->with(['success'=>'تم التعديل بنجاح']);
        }
        else{
            return redirect()->route('purchases.index')->with(['fail'=>'لم يتم التعديل هناك خلل ما']);
        }
    }
}
