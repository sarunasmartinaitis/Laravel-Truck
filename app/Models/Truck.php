<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = ['unit_number', 'year', 'notes'];

    public function truckSubunits()
    {
        return $this->hasMany(TruckSubunit::class, 'main_truck_id');
    }
}
