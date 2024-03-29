<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\OrderItemRepository;
use App\Services\ConnectRecommendedSystem;
use Illuminate\Http\Request;

class RecommendedController extends Controller
{
    private const SEARCH_CATEGORY_ID = '寿司';

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Client\Response
     */
    public function __invoke(Request $request)
    {
        $client_header = config('sushi_order_system.client_header');

        $purchase_histories = OrderItemRepository::getPurchaseHistories();
        $sushi_category = CategoryRepository::getCategoryId(self::SEARCH_CATEGORY_ID);

        $purchase_histories = $purchase_histories
            ->where('category_id', $sushi_category->id)
            ->map(function ($order_item) {
                return $order_item->item_id;
            });

        $response = ConnectRecommendedSystem::connect($client_header, $purchase_histories->toArray());

        return $response;
    }
}
