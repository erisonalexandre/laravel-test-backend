<?php

namespace App\Services\Property;

use App\Models\Property;

class DestroyPropertyService
{
    public static function destroy($id)
    {
        $property = Property::find($id);
        if ($property->contract) {
            $property->contract->delete();
        }
        $property->delete();
        return $property;
    }
}
