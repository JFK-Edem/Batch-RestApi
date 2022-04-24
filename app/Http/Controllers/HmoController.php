<?php

namespace App\Http\Controllers;

use App\Models\Hmo;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\HmoRequest;

class HmoController extends Controller
{

    public function store (HmoRequest $request) {
        $hmo = Hmo::create($request->validated());

        return response()->json([
            'success' => true,
            'data'=> $hmo
        ], 201);
    }

    public function index () {
       $hmos = Hmo::all();

       return response()->json([
        'success' => true,
        'data'=> $hmos
    ], 200);

    }



}
