<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'product_name'=>'required',
            'product_barcode'=>'required',
            'product_manufacturer_id'=>'required',
        ];
        if ($this->isMethod('POST')) {
            // Exclude validation rule for your_variable
            unset($rules['product_status']);
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'product_name.required'=>'اسم المنتج مطلوب',
            'product_barcode.required'=>'الباركود مطلوب',
            'product_manufacturer_id.required'=>'الشركة المصنعة مطلوبة',
            'product_status.required'=>'حالة المنتج مطلوب',
        ];
    }
}
