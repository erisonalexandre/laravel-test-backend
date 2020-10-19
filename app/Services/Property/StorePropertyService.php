<?php

namespace App\Services\Property;

use App\Models\Property;

class StorePropertyService
{
    public static function store(array $values)
    {
        return Property::create($values);
    }
}
