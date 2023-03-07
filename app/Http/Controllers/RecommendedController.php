<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommendedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $sushi_recommended_system = 'https://3thrfz1h40.execute-api.ap-northeast-1.amazonaws.com/Prod/recommended';
        $client_header = 'sushi_order_system';

        $order_items = OrderItem::select('item_id')
            ->orderByDesc('id')
            ->get();

        $order_items = $order_items->map(function ($order_item) {
            return $order_item->item_id;
        });

        $response = Http::acceptJson()
            ->withHeaders([
                'client-id' => $client_header,
            ])
            ->post($sushi_recommended_system, [
                'item_ids' => $order_items,
            ]);

        return $response;
    }
}
