<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CompleteOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepository;

final class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $orders = OrderRepository::getOrders();
        // order_idが同じものをまとめて、レスポンスがネストされた状態にする
        // eloquentコレクションを結合する

        return response()->json($orders);
    }

    /**
     * Display a listing of the uncompleted resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexUncompleted()
    {
        $orders = OrderRepository::getUncompletedOrders();
        // order_idが同じものをまとめて、レスポンスがネストされた状態にする
        // eloquentコレクションを結合する

        return response()->json($orders);
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
        $validated = $request->validated();
        OrderRepository::saveOrder($validated);

        $result = [
            'response' => 'Create new order',
            'validated_data' => $validated,
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
     * @param int $order_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CompleteOrderRequest $request, $order_id)
    {
        $result = OrderRepository::completedOrder($order_id);

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $order_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($order_id)
    {
        OrderRepository::dropOrder($order_id);

        $result = [
            'id' => $order_id,
            'response' => 'Destroy order' . $order_id,
        ];

        return response()->json($result);
    }
}
