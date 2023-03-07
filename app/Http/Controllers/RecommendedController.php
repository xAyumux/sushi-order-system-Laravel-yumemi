<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommendedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $sushi_recommended_system = 'https://3thrfz1h40.execute-api.ap-northeast-1.amazonaws.com/Prod/recommended';
        $client_header = 'sushi_order_system';
        // ItemRepository/getOrderItems()->item_id で履歴を取得
        $order_items = OrderItem::select('item_id')
            ->orderByDesc('id')
            ->get();
        // json化

        $response = Http::acceptJson()
            ->withHeaders([
                'client-id' => $client_header,
            ])
            ->post($sushi_recommended_system, [
                'item_ids' => [123, 234],
            ]);

        return $response;
    }
}
