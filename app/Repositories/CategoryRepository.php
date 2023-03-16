<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use App\Models\Item;

class CategoryRepository
{
    public static function getCategories()
    {
        $categories = Category::select('id', 'name')->get();

        return $categories;
    }

    public static function getCategoryItems(int $category_id)
    {
        $items = Item::where('category_id', $category_id)
            ->select('items.id', 'items.name', 'category_id', 'categories.name as category_name', 'price_history_id', 'price_histories.price')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->join('price_histories', 'items.price_history_id', '=', 'price_histories.id')
            ->orderBy('categories.id')
            ->orderBy('price_histories.id')
            ->get();

        return $items;
    }

    public static function getCategoryId(string $category_name)
    {
        $sushi_category = Category::where('name', $category_name)->first();
        return $sushi_category;
    }
}
