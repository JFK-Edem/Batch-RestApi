<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Hmo;
use COM;

class OrdersController extends Controller
{
    // batchBy 1 = month and year of encounter date.
    // bbatchBy 2 = month and year of the sent date.

    // public function batchOrders(Request $request) {


    //     $id = $request->hmo_id;

    //     $hmo = Hmo::findOrFail($id);
    //     $eDate = $request->encounter_date;
    //     $sDate = $request->created_at;
    //     $smonthYear = Carbon::createFromFormat('Y-m-d', $sDate)->format('F Y');


    //     $emonthYear = Carbon::createFromFormat('Y-m-d', $eDate)->format('F Y');



    //     $batch = $hmo->batchBy === 1 ?  : "Batch by sent date";
    //     return $batch;

    // }

    public function store (OrderRequest $request) {

        $input = $request->validated();

        $pName = $request->provider_name;

        $id = $request->hmo_id;

        $hmo = Hmo::findOrFail($id);
        $eDate = $request->encounter_date;
        $sDate = date('Y-m-d');


        $sMonthYear = Carbon::createFromFormat('Y-m-d', $sDate)->format('F Y');

        $eMonthYear = Carbon::createFromFormat('Y-m-d', $eDate)->format('F Y');
        


        $batch = $hmo->batchBy === 1 ? $pName ." ". $eMonthYear : $pName ." ". $sMonthYear;

        $input['batch'] = $batch;

  $orders = Order::create($input);


        return response()->json([
            'success' => true,
            'data'=> $orders
        ], 201);
    }



    public function index () {
        $orders = Order::all();

        return response()->json([
         'success' => true,
         'data'=> $orders
     ], 200);

     }
}
