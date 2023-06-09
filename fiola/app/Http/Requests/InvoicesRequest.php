<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoicesRequest extends FormRequest
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
        ];
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            // Exclude validation rule for your_variable
            unset($rules['invoices_type']);
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'invoices_type.required'=>'حقل نوع الفاتورة مطلوب'
        ];
    }
}
