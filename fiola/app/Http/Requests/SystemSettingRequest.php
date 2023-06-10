<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemSettingRequest extends FormRequest
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
            'company_name'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'company_name.required'=>'حقل اسم الشركة مطلوب',
            'address.required'=>'حقل العنوان مطلوب',
            'phone.required'=>'حقل رقم الهاتف مطلوب',
            'phone.numeric'=>'يجب ان يحتوي على ارقام فقط',
        ];
    }
}
