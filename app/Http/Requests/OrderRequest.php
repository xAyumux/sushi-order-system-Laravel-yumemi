<?php

declare(strict_types=1);

namespace App\Http\Requests;

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
            'customer_id' => ['required', 'numeric', 'integer'],
            'table_number' => ['required', 'numeric', 'integer'],
            'order_items' => ['required', 'array:order_id,item_id,price,amount'],
            'order_items.*.order_id' => ['required', 'numeric', 'integer'],
            'order_items.*.item_id' => ['required', 'numeric', 'integer'],
            'order_items.*.price' => ['required', 'numeric', 'integer'],
            'order_items.*.amount' => ['required', 'numeric', 'integer'],
            'order_options' => ['required', 'array:order_item_id,option_id'],
            'order_options.*.order_item_id' => ['required', 'numeric', 'integer'],
            'order_options.*.option_id' => ['required', 'numeric', 'integer'],
            'total_price' => ['required', 'numeric', 'integer'],
        ];
    }
}
