<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSuppliersRequest;
use App\Http\Requests\DeliveryRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{
    public function index(){
        $data = User::where(['role'=>5])->get();
        return view('admin.delivery.index',['data'=>$data]);
    }

    public function create(DeliveryRequest $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->user_phone = $request->user_phone;
        $data->password = Hash::make(123456789);
        $data->dob = Carbon::now()->toDate();
        $data->user_status = 1;
        $data->role = 5;
        if ($data->save()){
            return redirect()->route('delivery.index')->with(['success'=>'تم حفظ بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'هناك خطا ما لم يتم الحفظ'])->withInput();
        }
    }
}
