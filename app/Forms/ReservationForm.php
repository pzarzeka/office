<?php

namespace App\Forms;

use App\Model\Workplace;
use App\User;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class ReservationForm extends Form
{

    public function buildForm()
    {
        $workplaces = Workplace::all()->keyBy('id')->pluck('name', 'id')->toArray();
        $users = User::all()->keyBy('id')->pluck('name', 'id')->toArray();

        $this
            ->setFormOption('id', 'reservation-form')
            ->add('date', Field::DATE, [
                'rules' => 'required'
            ])
            ->add('workplace_id', Field::SELECT, [
                'rules' => 'required',
                'choices' =>  [null => 'Select'] + $workplaces,
            ])
            ->add('user_id', Field::SELECT, [
                'rules' => 'required',
                'choices' => $users,
            ])
            ->add('send', Field::BUTTON_SUBMIT)
        ;
    }

}