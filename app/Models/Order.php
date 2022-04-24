<?php

namespace App\Models;

use App\Models\Hmo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_name',
        'hmo_id',
        'encounter_date',
        'batch',
        'items',
        'total'
    ];

    protected $casts =  [
        'items' => 'array'
    ];



}
