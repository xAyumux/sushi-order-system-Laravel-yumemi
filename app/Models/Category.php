<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['category_id', 'created_at', 'updated_at'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
