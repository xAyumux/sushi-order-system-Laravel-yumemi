<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\OrderItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommendedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Client\Response
     */
    public function __invoke(Request $request)
    {
        $sushi_recommended_system = 'https://3thrfz1h40.execute-api.ap-northeast-1.amazonaws.com/Prod/recommended';
        $client_header = 'sushi_order_system';

        $purchase_histories = OrderItemRepository::getPurchaseHistories();
        $sushi_category = CategoryRepository::getCategoryId('寿司');

        $purchase_histories = $purchase_histories
            ->where('category_id', $sushi_category->id)
            ->map(function ($order_item) {
                return $order_item->item_id;
            });

        $response = Http::acceptJson()
            ->withHeaders([
                'client-id' => $client_header,
            ])
            ->post($sushi_recommended_system, [
                'item_ids' => $purchase_histories,
            ]);

        return $response;
    }
}
