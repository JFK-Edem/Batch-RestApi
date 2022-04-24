<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BatchController extends Controller
{
    public function createBatchOrder ($id) {

        $provider = Provider::findOrFail($id);

        $providerName = $provider->name;

        $encounterDate = $provider->encouter_date;

        $monthYear = Carbon::createFromFormat('Y-m-d', $encounterDate)->format('F Y');

        return response()->json([
            'success' => true,
            'data'=> $providerName ." ". $monthYear
        ], 200);


    }

    public function batchByEncounter () {

        $providers = Provider::all();


        foreach ($providers as $provider)  {

            dd($provider);

        $providersName = $provider->name;

        $encounterDate = $provider->encouter_date;

        $monthYear = Carbon::createFromFormat('Y-m-d', $encounterDate)->format('F Y');

        }

        // $providers->select(['encouter_date'])
        // ->get()
        // ->groupBy(function ($val) {
        //     $monY =  Carbon::parse($val->encouter_date)->format('F Y');
        // });

        return response()->json([
            'success' => true,
            'data' => $providersName ." ". $monthYear
        ], 200);

}

}
