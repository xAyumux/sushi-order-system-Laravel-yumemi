<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    public static function getItems()
    {
        $items = Item::select('items.name', 'category_id', 'categories.name as category_name', 'price_history_id', 'price_histories.price')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->join('price_histories', 'items.price_history_id', '=', 'price_histories.id')
            ->orderBy('categories.id')
            ->orderBy('price_histories.id')
            ->get();

        return $items;
    }
}
