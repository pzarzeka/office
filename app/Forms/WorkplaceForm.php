<?php

namespace App\Forms;

use App\Model\Equipment;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class WorkplaceForm extends Form
{

    public function buildForm()
    {
        $equipments = Equipment::whereNull('workplace_id')->get()->keyBy('id')->pluck('name', 'id')->toArray();

        $this
            ->add('name', Field::TEXT, [
                'rules' => 'required|min:5',
            ])
            ->add('description', Field::TEXTAREA, [
                'rules' => 'max:1000'
            ])
            ->add('equipments', 'collection', [
                'type' => 'select',
                'property' => 'id',
                'options' => [
                    'choices' => [null => 'Select'] + $equipments,
                    'label' => false,
                ],
                'wrapper' => [
                    'class' => 'form-group equipments'
                ]
            ])
            ->add('send', Field::BUTTON_SUBMIT)
        ;
    }

}