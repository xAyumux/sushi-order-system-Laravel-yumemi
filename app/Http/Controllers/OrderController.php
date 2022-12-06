<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
                    'delivered_at' => NULL,
                ]
            ]
        ];

        return response()->json($result);
    }

    /**
     * Display a listing of the uncompleted resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = [
            'response' => 'Create new order',
        ];

        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = [
            'id' => $id,
            'response' => 'Complete order' . $id,
        ];

        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
