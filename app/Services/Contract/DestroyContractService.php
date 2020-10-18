<?php

namespace App\Services\Contract;

use App\Models\Contract;

class DestroyContractService
{
    public static function destroy($id)
    {
        return Contract::destroy($id);
    }
}
