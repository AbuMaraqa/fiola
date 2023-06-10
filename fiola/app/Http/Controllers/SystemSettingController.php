<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemSettingRequest;
use App\Models\SystemSetting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public function index(SystemSettingRequest $request){
//        $data = SystemSetting::first();
//        $data = SystemSetting::findOrFail(1);
//        if () {
//
//        } else {
//            $data = new SystemSetting();
//        }
        try {
            $data = SystemSetting::first();
            return view('admin.system_setting.index',['data'=>$data]);
        }
        catch (Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return 'fail';
        }
    }

    public function add(){
        return view('admin.system_setting.add');
    }

    public function create(Request $request){
        $data = new SystemSetting();
        $data->company_name = $request->company_name;
        $data->address = $request->address;
        $data->fax = $request->fax;
        $data->phone = $request->phone;
        $data->website = $request->website;
        if($data->save()){
            return redirect()->route('home')->with(['success'=>'تم حفظ البيانات بنجاح']);
        }
        else{
            return redirect()->back()->withInput();
        }
    }

    public function edit($id){

    }

    public function update(SystemSettingRequest $request){

    }
}
