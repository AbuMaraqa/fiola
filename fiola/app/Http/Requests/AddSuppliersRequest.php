<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSuppliersRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'user_phone'=>'required|numeric|digits:10',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'email.required'=>'الايميل مطلوب',
            'email.email'=>'يجب ان يكون الايميل صالح',
            'email.unique'=>'هذا الايميل مستخدم من قبل',
            'user_phone.required'=>'رقم الهاتف مطلوب',
            'user_phone.numeric'=>'يجب ان يكون رقم الهاتف لا يحتوي على احرف',
            'user_phone.digits'=>'يجب الا يقل او يزيد رقم الهاتف عن 10 ارقام',
        ];
    }
}
