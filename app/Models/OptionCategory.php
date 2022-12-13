<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionCategory extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'option_category_id';

    protected $guarded = ['option_category_id', 'created_at', 'updated_at'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
