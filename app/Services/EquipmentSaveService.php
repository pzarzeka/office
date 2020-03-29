<?php

namespace App\Services;

use App\Model\Equipment;
use App\Services\abstracts\AbstractSaveService;
use Illuminate\Http\Request;

class EquipmentSaveService extends AbstractSaveService
{

    public function save(Request $request)
    {
        $model = new Equipment($request->all());
        $model->save();

        return $model;
    }

}