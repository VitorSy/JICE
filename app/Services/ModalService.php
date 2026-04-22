<?php

namespace App\Services;

use App\Models\Modal;

class ModalService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function getModals(){
        return Modal::all();
    }
}
