<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoicesRequest;
use App\Http\Requests\SalesRequest;
use App\Http\Requests\sssRequest;
use App\Models\Color;
use App\Models\InvoiceItems;
use App\Models\Pos;
use App\Models\Products;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index($invoice_id){
        $data['invoice_id']= $invoice_id;
        $data['product'] = Products::get();
        $data['colors'] = Color::get();
        $data['inventory'] = Pos::get();
        return view('admin.sales.add',['data'=>$data]);
    }

    public function create(SalesRequest $request){
        $success = true;
//        for ($i = 0;$i < $request->qty ; $i++){
            foreach ($request->size as $sizeKey){
                foreach ($request->color as $colorKey){
                    $data = new InvoiceItems();
                    $data->invoice_id = $request->invoice_id;
                    $data->product_id = $request->product_id;
                    $data->qty = $request->qty;
                    $data->size = $sizeKey;
                    $data->color_id = $colorKey;
                    $data->inventory_id = $request->inventory_id;
                    $data->coast_price = $request->coast_price;
                    $data->pos_price = $request->pos_price;
                    $data->wholesaler_price = $request->wholesaler_price;
                    $data->consignment_price = $request->consignment_price;
                    $data->sectoral_price = $request->sectoral_price;
                    $data->discount_permitted = $request->discount_permitted;
                    $data->discount_price = $request->discount_price;
                    $data->phantom_selling_point_price = $request->phantom_selling_point_price;
                    $data->marketer_profit = $request->marketer_profit;
                    $data->status = 1;
                    if (!$data->save()) {
                        $success = false;
                        break;
//                        return redirect()->route('invoices.details', ['id' => $request->invoice_id])->with(['success' => 'تم اضافة الصنف بنجاح'])->withInput($request->input());
                    }

                }
                if (!$success){
                    break;
                }
            }
        if ($success) {
            return redirect()->route('invoices.details', ['id' => $request->invoice_id])
                ->with(['success' => 'تم اضافة الصنف بنجاح'])
                ->withInput($request->input());
        } else {
            return redirect()->back()
                ->with(['fail' => 'هناك خطا لم يتم اضافة البيانات'])
                ->withInput($request->input());
        }
//        }

    }

    public function deleteInvoiceItemsSales($id){
        $data = InvoiceItems::where('id',$id)->delete();
        if ($data){
            return response()->json([
                'message'=>'success'
            ]);
        }
        else{
            return response()->json([
                'message'=>'fail'
            ]);
        }
    }

    public function editInvoiceItemsSales(Request $request){
        $data = InvoiceItems::where('id',$request->id)->first();
        $data->{$request->column_name} = $request->column_value;
        if ($data->save()){
            return response()->json([
                'message'=>'success',
                'data'=>$data
            ]);
        }
        else{
            return response()->json([
                'message'=>'fail'
            ]);
        }
    }
}
