<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'order_id';

    public const CREATED_AT = 'ordered_at';
    public const UPDATED_AT = 'delivered_at';

    protected $guarded = ['order_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
