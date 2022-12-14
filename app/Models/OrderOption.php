<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderOption extends Model
{
    use HasFactory;

    protected $guarded = ['order_option_id', 'created_at', 'updated_at'];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
