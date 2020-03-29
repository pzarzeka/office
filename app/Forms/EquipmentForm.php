<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class EquipmentForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('kind', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('model', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('name', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('year_purchase', Field::TEXT, [
                'rules' => 'required|max:4|digits:4'
            ])
            ->add('value', Field::TEXT, [
                'rules' => 'required|numeric|min:0'
            ])
            ->add('description', Field::TEXTAREA, [
                'rules' => 'max:1000'
            ])
            ->add('send', Field::BUTTON_SUBMIT)
        ;
    }

}