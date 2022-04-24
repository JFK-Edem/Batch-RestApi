<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hmo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'hmo_id', 'email', 'batchBy'];


    public function orders() {
        return $this->hasMany(Order::class);
    }
}
