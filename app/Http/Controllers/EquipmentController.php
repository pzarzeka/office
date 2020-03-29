<?php

namespace App\Http\Controllers;

use App\Model\Equipment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\EquipmentForm;
use App\Services\EquipmentSaveService;

class EquipmentController extends BaseController
{

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(EquipmentForm::class, [
            'method' => 'POST',
            'url' => route('equipment.save')
        ]);

        return view('admin.forms.equipment', compact('form'));
    }

    public function save(Request $request, FormBuilder $formBuilder, EquipmentSaveService $service)
    {
        $form = $formBuilder->create(EquipmentForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        try {
            $service->save($request);
        } catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with('message', 'Action error. Please try again later.');
        }

        return redirect()
            ->route('equipment.list')
            ->with('message', 'Action performed correctly.');
    }

    public function list()
    {
        return view('admin.lists.equipment');
    }

    public function data()
    {
        try {
            $data = Equipment::with('workplace')->get();
        } catch (\Exception $exception) {
            $data = [];
        }

        return response()->json(['data' => $data]);
    }

}