<?php

namespace App\Http\Controllers;

use App\Forms\WorkplaceForm;
use App\Model\Workplace;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Services\WorkplaceSaveService;

class WorkplaceController extends BaseController
{

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(WorkplaceForm::class, [
            'method' => 'POST',
            'url' => route('workplace.save')
        ]);

        return view('admin.forms.workplace', compact('form'));
    }

    public function save(Request $request, FormBuilder $formBuilder, WorkplaceSaveService $service)
    {
        $form = $formBuilder->create(WorkplaceForm::class);

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
            ->route('workplace.list')
            ->with('message', 'Action performed correctly.');
    }

    public function list()
    {
        return view('admin.lists.workplace');
    }

    public function data()
    {
        try {
            $data = Workplace::with('equipments')->get();
        } catch (\Exception $exception) {
            $data = [];
        }

        return response()->json(['data' => $data]);
    }

}