<?php

namespace App\Services;

use App\Models\Place;
use Illuminate\Database\Eloquent\Model;

class PlaceService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function getPlaces(){
        return Place::all();
    }


    public function getPlace($value, $field='id'): Model|null {
        return Place::where($field, $value)->first();
    }
}
