<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'customer_id';

    protected $guarded = ['customer_id', 'created_at', 'updated_at'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
