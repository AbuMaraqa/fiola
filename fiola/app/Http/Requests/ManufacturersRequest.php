<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturersRequest extends FormRequest
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
            'manufacturers_name'=>'required',
            'manufacturers_logo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ];
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            // Exclude validation rule for your_variable
            unset($rules['manufacturers_logo']);
        }

        return $rules;

    }

    public function messages()
    {
        return [
            'manufacturers_name.required'=>'اسم الشركة المصنعة مطلوب',
            'manufacturers_logo.required'=>'اللوجو الخاص بالشركة المصنعة مطلوب',
            'manufacturers_logo.image'=>'هذا الحقل عبارة عن صورة',
            'manufacturers_logo.mimes'=>'هذا الحقل عبارة عن صورة',
            'manufacturers_logo.max'=>'يجب ان يكون حجم الصورة اقل من 2048',
        ];
    }
}
