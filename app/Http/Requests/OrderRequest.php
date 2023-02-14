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
            'table_number' => ['required', 'integer'],
            'order_items' => ['required', 'array:order_id,item_id,price,amount'],
            'order_items.*.order_id' => ['required', 'integer'],
            'order_items.*.item_id' => ['required', 'integer'],
            'order_items.*.price' => ['required', 'integer'],
            'order_items.*.amount' => ['required', 'integer'],
            'order_options' => ['required', 'array:order_item_id,option_id'],
            'order_options.*.order_item_id' => ['required', 'integer'],
            'order_options.*.option_id' => ['required', 'integer'],
            'total_price' => ['required', 'integer'],
        ];
    }
}
