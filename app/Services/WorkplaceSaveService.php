<?php

namespace App\Services;

use App\Model\Equipment;
use App\Model\Workplace;
use App\Services\abstracts\AbstractSaveService;
use Illuminate\Http\Request;

class WorkplaceSaveService extends AbstractSaveService
{

    public function save(Request $request)
    {
        $model = new Workplace($request->all());
        $model->save();

        $equipments = $request->all('equipments')['equipments'];
        foreach ($equipments as $item => $value) {
            $equipment = Equipment::find($value);
            $equipment->workplace_id = $model->id;
            $equipment->save();
//            $model->equipments()->attach($model->id, ['equipment_id' => $value]);
        }

        return $model;
    }

}