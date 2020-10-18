<?php

namespace App\Services\Property;

use App\Models\Property;

class PropertiesWithoutContractService
{
    public static function list()
    {
        return Property::whereDoesntHave('contract')->get();
    }
}
