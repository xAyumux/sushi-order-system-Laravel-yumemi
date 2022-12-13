<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderOption extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'order_option_id';

    protected $guarded = ['order_option_id'];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
