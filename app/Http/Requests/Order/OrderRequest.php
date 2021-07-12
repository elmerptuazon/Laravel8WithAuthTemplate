<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'customer_code' => 'required',
            'order_number' => 'required',
            'gross_sales' => 'required|numeric',
            'order_details' => 'required|array',
            'is_cancelled' => 'required'
        ];
    }
}
