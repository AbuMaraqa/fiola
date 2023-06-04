<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        $userId = $this->route('user_id');
        return [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$userId,
            'user_phone'=>'required|numeric|digits:10',
            'password'=>'required',
            'dob'=>'required',
            'role'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'email.required'=>'الايميل مطلوب',
            'email.email'=>'يجب كتابة الايميل بشكل صحيح',
            'email.unique'=>'هذا الايميل مستخدم من قبل',
            'password.required'=>'كلمة المرور مطلوبة',
            'dob.required'=>'تاريخ الميلاد مطلوب',
            'role.required'=>'الصلاحية مطلوبة',
            'user_phone.required'=>'الهاتف مطلوب',
            'user_phone.numeric'=>'يجب ان يحتوي حقل الهاتف على ارقام',
            'user_phone.digits'=>'يجب ان يحتوي حقل الهاتف على 10 ارقام',
        ];
    }
}
