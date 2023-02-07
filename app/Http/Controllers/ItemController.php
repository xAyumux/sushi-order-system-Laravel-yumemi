<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $items = Item::select('items.name', 'category_id', 'categories.name as category_name', 'price_history_id', 'price_histories.price')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->join('price_histories', 'items.price_history_id', '=', 'price_histories.id')
            ->orderBy('categories.id')
            ->orderBy('price_histories.id')
            ->get();

        return response()->json($items);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json(['message' => 'Not Implemented.'], 501);
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        return response()->json(['message' => 'Not Implemented.'], 501);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return response()->json(['message' => 'Not Implemented.'], 501);
    }
}
