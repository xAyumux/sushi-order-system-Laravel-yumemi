<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderOption;
use Carbon\Carbon;

final class OrderRepository
{
    public static function getOrders()
    {
        $orders = Order::select('orders.id', 'table_number', 'total_price', 'order_items.price', 'order_items.amount', 'items.name as item_name', 'order_options.order_item_id', 'options.name as option_name', 'delivered_at')
            ->rightJoin('order_items', 'orders.id', '=', 'order_items.order_id')
            ->leftJoin('items', 'order_items.item_id', '=', 'items.id')
            ->leftJoin('order_options', 'order_items.id', '=', 'order_options.order_item_id')
            ->leftJoin('options', 'order_options.option_id', '=', 'options.id')
            ->orderByDesc('orders.id')
            ->orderByDesc('order_items.id')
            ->get();

        return $orders;
    }

    public static function getUncompletedOrders()
    {
        $orders = Order::select('orders.id', 'table_number', 'total_price', 'order_items.price', 'order_items.amount', 'items.name as item_name', 'order_options.order_item_id', 'options.name as option_name', 'delivered_at')
            ->rightJoin('order_items', 'orders.id', '=', 'order_items.order_id')
            ->leftJoin('items', 'order_items.item_id', '=', 'items.id')
            ->leftJoin('order_options', 'order_items.id', '=', 'order_options.order_item_id')
            ->leftJoin('options', 'order_options.option_id', '=', 'options.id')
            ->whereNull('delivered_at')
            ->orderByDesc('orders.id')
            ->orderByDesc('order_items.id')
            ->get();

        return $orders;
    }

    public static function saveOrder(array $validated)
    {
        $order = Order::create([
            'customer_id' => $validated['customer_id'],
            'total_price' => $validated['total_price'],
            'table_number' => $validated['table_number'],
        ]);

        global $order_item;
        foreach ($validated['order_items'] as $validated_item) {
            $order_item = OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $validated_item['item_id'],
                'price' => $validated_item['price'],
                'amount' => $validated_item['amount'],
            ]);
        }

        // Needs improvement オーダーをする際に、"order_option_id"がどの"order_item_id"と関連しているかの判別が出来ていない
        foreach ($validated['order_options'] as $validated_option) {
            $order_option = OrderOption::create([
                'order_item_id' => $order_item->id,
                'option_id' => $validated_option['option_id'],
            ]);
        }

        return;
    }

    public static function completedOrder(int $order_id)
    {
        $order = Order::find($order_id);
        if (null === $order->delivered_at) {
            $order->delivered_at = Carbon::now();
            $order->save();

            $result = [
                'id' => $order_id,
                'response' => 'Complete order: ' . $order_id,
            ];
        } else {
            $result = [
                'id' => $order_id,
                'response' => 'Already completed order: ' . $order_id,
            ];
        }

        return $result;
    }

    public static function dropOrder(int $order_id)
    {
        Order::destroy($order_id);

        return;
    }
}
