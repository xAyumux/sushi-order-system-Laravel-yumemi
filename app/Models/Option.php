<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'option_id';

    protected $guarded = ['option_id'];

    public function orderOptions()
    {
        return $this->hasMany(OrderOption::class);
    }

    public function optionCategory()
    {
        return $this->belongsTo(OptionCategory::class);
    }
}
