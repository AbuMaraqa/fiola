<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'invoice_id'=>'required',
            'product_id'=>'required',
            'qty'=>'required|numeric',
            'size'=>'required',
            'color'=>'required',
            'inventory_id'=>'required',
            'coast_price'=>'required|numeric',
            'pos_price'=>'required|numeric',
            'wholesaler_price'=>'required|numeric',
            'consignment_price'=>'required|numeric',
            'sectoral_price'=>'required|numeric',
            'discount_permitted'=>'required|numeric',
            'discount_price'=>'required|numeric',
            'phantom_selling_point_price'=>'required|numeric',
            'marketer_profit'=>'required|numeric',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'invoice_id.required'=>'حقل رقم الفاتورة مطلوب',
            'product_id.required'=>'حقل رقم الصنف مطلوب',
            'qty.required'=>'حقل الكمية الصنف مطلوب',
            'qty.numeric'=>'يجب ان يحتوي حقل الكمية على ارقام',
            'size.required'=>'حقل الحجم مطلوب',
            'color.required'=>'حقل الالوان مطلوب',
            'inventory_id.required'=>'حقل المخزن مطلوب',
            'coast_price.required'=>'حقل سعر التكلفة مطلوب',
            'coast_price.numeric'=>'يجب ان يحتوي حقل سعر التكلفة على ارقام',
            'pos_price.required'=>'حقل سعر نقطة البيع مطلوب',
            'pos_price.numeric'=>'يجب ان يحتوي حقل سعر نقطة البيع على ارقام',
            'wholesaler_price.required'=>'حقل سعر تاجر الجملة مطلوب',
            'wholesaler_price.numeric'=>'يجب ان يحتوي حقل سعر تاجر الجملة على ارقام',
            'consignment_price.required'=>'حقل سعر تاجر برسم البيع مطلوب',
            'consignment_price.numeric'=>'يجب ان يحتوي حقل سعر تاجر برسم البيع على ارقام',
            'sectoral_price.required'=>'حقل سعر القطاعي مطلوب',
            'sectoral_price.numeric'=>'يجب ان يحتوي حقل سعر القطاعي على ارقام',
            'discount_permitted.required'=>'حقل خصم مسموح به مطلوب',
            'discount_permitted.numeric'=>'يجب ان يحتوي حقل خصم مسموح به على ارقام',
            'discount_price.required'=>'حقل سعر التنزيلات مطلوب',
            'discount_price.numeric'=>'يجب ان يحتوي سعر التنزيلات على ارقام',
            'phantom_selling_point_price.required'=>'حقل سعر نقطة بيع وهمي مطلوب',
            'phantom_selling_point_price.numeric'=>'يجب ان يحتوي حقل سعر نقطة بيع وهمي على ارقام',
            'marketer_profit.required'=>'حقل ربح المسوق مطلوب',
            'marketer_profit.numeric'=>'يجب ان يحتوي حقل ربح المسوق على ارقام',
        ];
    }
}
