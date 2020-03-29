<?php

namespace App\Http\Controllers;

use App\Forms\ReservationForm;
use App\Model\Reservation;
use App\Services\ReservationSaveService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Validators\ReservationValidator;

class ReservationController extends BaseController
{

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ReservationForm::class, [
            'method' => 'POST',
            'url' => route('reservation.save')
        ]);

        return view('admin.forms.reservation', compact('form'));
    }

    public function save(
        Request $request,
        FormBuilder $formBuilder,
        ReservationValidator $validator,
        ReservationSaveService $service
    )
    {
        $form = $formBuilder->create(ReservationForm::class);
        if (!$form->isValid()) {
            return response()->json([
                'message' => 'Please complete the form correctly.',
                'status' => false,
            ]);
        }

        $validator->setRequest($request);
        if (!$validator->validate()) {
            return response()->json([
                'message' => 'Reservation is not available. Please choose a different date.',
                'status' => false,
            ]);
        }

        try {
            $service->save($request);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Action error. Please try again later.',
                'status' => false,
                'info' => $exception->getMessage()
            ]);
        }

        return response()->json([
            'message' => 'Action performed correctly.',
            'status' => true
        ]);
    }

    public function list()
    {
        return view('admin.lists.reservation');
    }

    public function data()
    {
        try {
            $data = Reservation::all();
        } catch (\Exception $exception) {
            $data = [];
        }

        return response()->json(['data' => $data]);
    }

}