<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoicesRequest;
use App\Http\Requests\SalesRequest;
use App\Http\Requests\sssRequest;
use App\Models\Color;
use App\Models\InvoiceItems;
use App\Models\Invoices;
use App\Models\Pos;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class SalesController extends Controller
{
    public function index(){
//        $data['invoice_id']= $invoice_id;
//        $data['product'] = Products::get();
//        $data['colors'] = Color::get();
//        $data['inventory'] = Pos::get();
//        return view('admin.sales.add',['data'=>$data]);
        //TODO this function for invoices_type for Sales
        $data = Invoices::where(['invoices_type'=>1])->get();
        foreach ($data as $key){
            $key->user = User::where(['id'=>$key->user_id])->first();
            $key->inventory = Pos::where(['id'=>$key->inventory_id])->first();
            $key->added_by = User::where(['id'=>$key->added_by])->first();
        }
        return view('admin.sales.index',['data'=>$data]);
    }

    public function add($id){
        $data = Invoices::find($id);
        $data['items'] = Products::get();
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

    public function details($id){
        $data['invoices'] = Invoices::where(['id'=>$id])->first();
        $data['users'] = User::where('role',4)->orWhere('role',5)->first();
        $data['inventory'] = Pos::where('id',$data['invoices']->inventory_id)->first();
        $data['invoice_id'] = $id;
        $data['product'] = Products::first();
        $data['colors'] = Color::first();
        $data['added_by'] = User::where('id',$data['invoices']->added_by)->first();
        $invoice_item = InvoiceItems::where('invoice_id',$id)->first();
        return view('admin.sales.details',['data'=>$data,'invoice_item'=>$invoice_item]);
    }

    public function edit($id){
        $data = Invoices::where('id',$id)->first();
        $users = User::where('role',3)->orWhere('role',4)->get();
        $inventory = Pos::get();
        return view('admin.sales.edit',['data'=>$data,'users'=>$users,'inventory'=>$inventory]);
    }

    public function update(InvoicesRequest $request){
        $data = Invoices::where(['id'=>$request->id])->first();
        $data->user_id = $request->user_id;
        $data->inventory_id = $request->inventory_id;
        if ($data->save()){
            return redirect()->route('sales.index')->with(['success'=>'تم التعديل بنجاح']);
        }
        else{
            return redirect()->route('sales.index')->with(['fail'=>'لم يتم التعديل هناك خلل ما']);
        }
    }

    public function selectAllProductInInvoicesItems(Request $request){
        $data = InvoiceItems::select('inovices.id as i_id','inovices.*','invoice_items.*')->join('inovices','inovices.id','=','invoice_items.invoice_id')->where('product_id',$request->product_id)->where('invoices_type',2)->orderBy('invoice_items.color_id')->get();
        foreach ($data as $key){
            $key->items = Products::where(['id'=>$key->product_id])->first();
            $key->color = Color::where(['id'=>$key->color_id])->first();
        }
        return response()->json([
            'message'=>'success',
            'data'=>$data
        ]);
    }

    public function createSalesInvoiceItems(Request $request)
    {
        $find = InvoiceItems::where('invoice_id', $request->invoice_id)
            ->where('product_id', $request->data['product_id'])
            ->where('color_id', $request->data['color_id'])
            ->where('size', $request->data['size'])
            ->first();

        if (empty($find)) {
            // Data not found, do nothing
            $new = new InvoiceItems();
            $new->invoice_id = $request->invoice_id;
            $new->product_id = $request['data']['product_id'];
            $new->pos_price = $request->pos_price;
            $new->qty = $request->qty;
            $new->size = $request['data']['size'];
            $new->color_id = $request['data']['color_id'];
            $new->inventory_id = $request['data']['inventory_id'];
            $new->coast_price = $request['data']['coast_price'];
            $new->wholesaler_price = $request['data']['wholesaler_price'];
            $new->consignment_price = $request['data']['consignment_price'];
            $new->sectoral_price = $request['data']['sectoral_price'];
            $new->discount_permitted = $request['data']['discount_permitted'];
            $new->discount_price = $request['data']['discount_price'];
            $new->phantom_selling_point_price = $request['data']['phantom_selling_point_price'];
            $new->marketer_profit = $request['data']['marketer_profit'];
            $new->status = 1;

            if ($new->save()) {
                $data = InvoiceItems::select('inovices.id as i_id', 'inovices.*', 'invoice_items.*')
                    ->join('inovices', 'inovices.id', '=', 'invoice_items.invoice_id')
                    ->where('invoices_type', 1)
                    ->where('invoice_items.invoice_id', $request->invoice_id)
                    ->get();

                foreach ($data as $key) {
                    $key->items = Products::where('id', $key->product_id)->first();
                }
                return response()->view('admin.sales.productTable', ['data' => $data]);
            } else {
                $data = InvoiceItems::select('inovices.id as i_id', 'inovices.*', 'invoice_items.*')
                    ->join('inovices', 'inovices.id', '=', 'invoice_items.invoice_id')
                    ->where('invoices_type', 1)
                    ->where('invoice_items.invoice_id', $request->invoice_id)
                    ->get();

                foreach ($data as $key) {
                    $key->items = Products::where('id', $key->product_id)->first();
                }
                return response()->view('admin.sales.productTable', ['data' => $data]);

            }
        }
        else{
            $find->qty = $request->qty;
            $find->pos_price = $request->pos_price;
            $find->save();
            $data = InvoiceItems::select('inovices.id as i_id', 'inovices.*', 'invoice_items.*')
                ->join('inovices', 'inovices.id', '=', 'invoice_items.invoice_id')
                ->where('invoices_type', 1)
                ->where('invoice_items.invoice_id', $request->invoice_id)
                ->get();

            foreach ($data as $key) {
                $key->items = Products::where('id', $key->product_id)->first();
            }
            return response()->view('admin.sales.productTable', ['data' => $data]);

        }


    }

    public function getProductOnLoad($id){
        $data = InvoiceItems::where('invoice_id',$id)->get();
        foreach ($data as $key){
            $key->items = Products::where('id',$key->product_id)->first();
            $key->colors = Color::where('id',$key->color_id)->first();
        }
        return response()->view('admin.sales.productTable',['data'=>$data]);
    }

    public function deleteProductFromSalesInvoice($id,Request $request){
        InvoiceItems::where('id',$id)->delete();

        $data = InvoiceItems::where('invoice_id',$request->invoice_id)->get();
        foreach ($data as $key){
            $key->items = Products::where('id',$key->product_id)->first();
            $key->colors = Color::where('id',$key->color_id)->first();
        }
        return response()->view('admin.sales.productTable',['data'=>$data]);
    }

}
