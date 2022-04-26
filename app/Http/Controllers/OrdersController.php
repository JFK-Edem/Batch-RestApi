<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hmo;
use App\Models\Order;
use App\Actions\GetBatchName;
use App\Http\Requests\OrderRequest;


class OrdersController extends Controller
{

    public function create (OrderRequest $request) {

        $input = $request->validated();
        $pName = $request->provider_name;

        $id = $request->hmo_id;

        $hmo = Hmo::findOrFail($id);
        $eDate = $request->encounter_date;
      

        $input['batch'] = app()->make(GetBatchName::class)->handle($hmo, $eDate, $pName);
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
