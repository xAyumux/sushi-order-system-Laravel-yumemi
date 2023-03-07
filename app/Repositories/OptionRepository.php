<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Option;

class OptionRepository
{
    public static function getOptions()
    {
        $options = Option::select('options.id', 'options.name', 'option_category_id', 'option_categories.name as option_category_name')
            ->join('option_categories', 'option_category_id', '=', 'option_categories.id')
            ->orderBy('option_category_id')
            ->get();

        return $options;
    }
}
