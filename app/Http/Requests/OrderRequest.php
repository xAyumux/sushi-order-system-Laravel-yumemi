<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 客かどうかの確認が本来は必要
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
            'customer_id' => ['required', 'integer'],
            'table_number' => ['required', 'integer'],
            'order_items' => ['required', 'array'],
            'order_items.*.item_id' => ['required', 'integer'],
            'order_items.*.price' => ['required', 'integer'],
            'order_items.*.amount' => ['required', 'integer'],
            'order_options' => ['required', 'array'],
            'order_options.*.option_id' => ['required', 'integer'],
            'total_price' => ['required', 'integer'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response['data']    = [];
        $response['status']  = 'NG';
        $response['summary'] = 'Failed validation.';
        $response['errors']  = $validator->errors()->toArray();

        throw new HttpResponseException(
            response()->json($response, 422)
        );
    }
}
