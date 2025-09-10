<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUmscRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'doc_no' => 'required|string|max:50|unique:umscs,doc_no',
            'service_date' => 'required|date',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:30',
            'items_json' => 'required|string', // hidden field จาก JS
            'subtotal' => 'required|numeric|min:0',
            'tax' => 'nullable|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'items_json.required' => 'กรุณาใส่รายการอย่างน้อย 1 รายการ',
        ];
    }
}
