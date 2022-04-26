<?php

namespace App\Actions;

use Carbon\Carbon;
use App\Http\Controllers\OrdersController;
use App\Models\Hmo;

class GetBatchName
{
    public function handle($hmo, $eDate, $pName) {

        $carbonInstance = $hmo->batchBy === 1 ? Carbon::parse($eDate) : Carbon::now();

        return "$pName $carbonInstance->monthName $carbonInstance->year";


    }
}
