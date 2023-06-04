<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'categories_name'=>'required',
            'parent_id'=>'required',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'categories_name.required'=>'حقل الاسم مطلوب',
            'parent_id.required'=>'يجب ان يرتبط ب اب',
        ];
    }
}
