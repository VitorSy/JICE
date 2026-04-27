<?php

namespace App\Services;

use App\Models\Modal;
use Illuminate\Database\Eloquent\Collection;

class ModalService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function getModals(): Collection {
        return Modal::all();
    }


    public function getModal($value, $field='id') {
        return Modal::where($field, $value)->first();
    }
}
