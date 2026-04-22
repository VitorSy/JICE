<?php

namespace App\Services;

use App\Models\Place;

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
}
