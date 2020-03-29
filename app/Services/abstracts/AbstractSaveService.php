<?php

namespace App\Services\abstracts;

use Illuminate\Http\Request;

abstract class AbstractSaveService
{

    abstract public function save(Request $request);

}