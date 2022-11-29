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

        return view('order.index', compact('result'));
    }

    /**
     * Display a listing of the uncompleted resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUncompleted()
    {
        return 'Get uncompleted order';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Create new order';
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
        return 'Complete order ' . $id;
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
        return 'Destroy order ' . $id;
    }
}
