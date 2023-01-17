<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
