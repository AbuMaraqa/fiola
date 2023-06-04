<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosRequest extends FormRequest
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
            'pos_name'=>'required',
            'pos_address'=>'required',
            'pos_phone'=>'required|numeric|digits:10',
            'pos_type'=>'required'
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'pos_name.required'=>'الاسم مطلوب',
            'pos_address.required'=>'العنوان مطلوب',
            'pos_phone.required'=>'الهاتف مطلوب',
            'pos_phone.numeric'=>'يجب ان يكون عنوان الهاتف صالح ولا يحتوي على احرف',
            'pos_phone.digits'=>'يجب الا يقل او يزيد رقم الهاتف على 10 ارقام',
            'pos_type.required'=>'النوع مطلوب',
        ];
    }
}
