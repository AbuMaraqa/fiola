<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoicesRequest;
use App\Models\Color;
use App\Models\Invoices;
use App\Models\Pos;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index(){
        $data = Invoices::get();
        foreach ($data as $key){
            $key->user = User::where(['id'=>$key->user_id])->first();
        }
        foreach ($data as $key){
            $key->added_by = User::where(['id'=>$key->added_by])->first();
        }
        foreach ($data as $key){
            $key->inventory = Pos::where(['id'=>$key->inventory_id])->first();
        }
        return view('admin.invoices.index',['data'=>$data]);
    }

    public function add(){
        $inventory = Pos::get();
        $users = User::where('role',3)->orWhere('role',4)->get();
        return view('admin.invoices.add',['inventory'=>$inventory,'users'=>$users]);
    }

    public function create(InvoicesRequest $request){
        $data = new Invoices();
        $data->user_id = $request->user_id;
        $data->date_time = Carbon::now();
        $data->invoices_type = $request->invoices_type;
        $data->invoices_status = 1;
        $data->added_by = auth()->user()->id;
        $data->inventory_id = $request->inventory_id;
        if ($data->save()){
            if ($request->invoices_type == 1){
                return redirect()->route('sales.index',['invoice_id'=>$data->id]);
//                return redirect()->route('sales.index',['invoice_id'=>$data->id]);
            }
//            return redirect()->route('invoices.index')->with(['success'=>'تم اضافة البيانات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'هناك خلل لم يتم اضافة البيانات'])->withInput();
        }
    }

    public function details($id){
        $data['invoices'] = Invoices::where(['id'=>$id])->get();
        $data['users'] = User::where('role',4)->orWhere('role',5)->get();
        $data['inventory'] = Pos::get();
        $data['invoice_id'] = $id;
        $data['product'] = Products::get();
        $data['colors'] = Color::get();
        return view('admin.sales.details',['data'=>$data]);
    }
}
