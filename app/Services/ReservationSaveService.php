<?php

namespace App\Services;

use App\Model\Reservation;
use App\Services\abstracts\AbstractSaveService;
use Illuminate\Http\Request;

class ReservationSaveService extends AbstractSaveService
{

    public function save(Request $request)
    {
        $model = new Reservation($request->all());
        $model->save();

        return $model;
    }

}