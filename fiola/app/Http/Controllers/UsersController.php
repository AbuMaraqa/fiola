<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSuppliersRequest;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UsersController extends Controller
{
    public function index(){
        $data = User::get();
        return view('admin.users.index',['data'=>$data]);
    }

    public function add(){
        return view('admin.users.add');
    }

    public function create(UsersRequest $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->dob = $request->dob;
        $data->user_phone = $request->user_phone;
        $data->user_status = 1;
        $data->role = $request->role;
        if ($data->save()){
            return redirect()->route('users.index')->with(['success'=>'تم اضافة البيانات بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'لم تتم الاضافة هناك خلل ما'])->withInput();
        }
    }

    public function edit($id){
        $data = User::findOrFail($id);
        return view('admin.users.edit',['data'=>$data]);
    }

    public function update($user_id,UsersRequest $request){
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['dob'] = $request->dob;
        $data['user_phone'] = $request->user_phone;
        $data['user_status'] = $request->user_status == 'on' ? 1:0 ;
        $data['role'] = $request->role;
        if (User::where(['id'=>$user_id])->update($data)){
            return redirect()->route('users.index')->with(['success'=>'تم التعديل بنجاح']);
        }
        else{
            return redirect()->back()->with(['fail'=>'هناك خطا ما لم يتم التعديل'])->withInput();
        }
    }

}
