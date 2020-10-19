<?php

namespace App\Services\Contract;

use App\Mail\ContractedPropertyMail;
use App\Models\Contract;
use Exception;
use Illuminate\Support\Facades\Mail;

class StoreContractService
{
    public static function store(array $values)
    {
        $contract = Contract::create($values);
        Mail::to($contract->property->email)->send(new ContractedPropertyMail($contract, self::transformAddressToString($contract->property, ['street', 'number', 'city', 'state'])));
        return $contract;
    }

    private static function transformAddressToString($address, $fields) {
        if (!$address || !$fields) {
            return null;
        }
        $string = null;
        foreach($fields as $field) {
            if(isset($address[$field]) && gettype($address[$field]) == 'string') {
                if (gettype($string) == 'string') {
                    $string = $string . ', ' . $address[$field];
                } else {
                    $string = $address[$field];
                }
            }
        }
        return $string;
    }
}
