<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
        return [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'invoice' => 'required',
            'date' => 'required',
            'total' => 'required',
            'subtotal' => 'required',
            'total_qty' => 'required',
            'product' => 'required',
            'serial_no' => 'required',
            'single_qty' => 'required',
            'unit_price' => 'required',
            'amount' => 'required',

        ];
    }
}
