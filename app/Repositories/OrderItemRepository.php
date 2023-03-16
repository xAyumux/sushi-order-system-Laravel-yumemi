<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\OrderItem;

class OrderItemRepository
{
    public static function getPurchaseHistories()
    {
        $purchase_histories = OrderItem::select('item_id', 'category_id')
            ->leftJoin('items', 'item_id', '=', 'items.id')
            ->orderByDesc('order_items.created_at')
            ->get();

        return $purchase_histories;
    }
}
