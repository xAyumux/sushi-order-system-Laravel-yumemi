<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CompleteOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderOption;

final class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $result = [
            [
                'table_number' => 1,
                'order_items' => [
                    'item_id' => 1,
                    'name' => 'maguro',
                    'price' => 200,
                    'order_options' => [
                        'option_id' => 1,
                        'option_name' => 'mayonnaise',
                    ],
                    'amount' => 2,
                    'delivered_at' => null,
                ]
            ]
        ];

        return response()->json($result);
    }

    /**
     * Display a listing of the uncompleted resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexUncompleted()
    {
        $result = [
            'response' => 'Get uncompleted order',
        ];

        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        return response()->json(['message' => 'Not Implemented.'], 501);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\OrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderRequest $request)
    {
        $request = $request->validated();
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'total_price' => $request->total_price,
            'table_number' => $request->table_number,
        ]);

        foreach ($request['order_items'] as $request_item) {
            $order_item = OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $request_item['item_id'],
                'price' => $request_item['price'],
                'amount' => $request_item['amount'],
            ]);

            // $order_option = OrderOption::create([
            //     'order_item_id' => $order_item->id,
            //     'option_id' => $request['order_options']['option_id'],
            // ]);
        }

        foreach ($request['order_options'] as $request_option) {
            $order_option = OrderOption::create([
                'order_item_id' => $order_item->id,
                'option_id' => $request_option['option_id'],
            ]);
        }

        $result = [
            'response' => 'Create new order',
        ];

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(['message' => 'Not Implemented.'], 501);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        return response()->json(['message' => 'Not Implemented.'], 501);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CompleteOrderRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CompleteOrderRequest $request, $id)
    {
        $result = [
            'id' => $id,
            'response' => 'Complete order' . $id,
        ];

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $result = [
            'id' => $id,
            'response' => 'Destroy order' . $id,
        ];

        return response()->json($result);
    }
}
