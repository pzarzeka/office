<?php

namespace App\Validators;

use App\Model\Reservation;
use Illuminate\Http\Request;

class ReservationValidator
{

    private $request;

    /**
     * @return mixed
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function __construct()
    {

    }

    public function validate()
    {
        $data = Reservation::where('date', $this->request->date)
            ->andWhere('workplace_id', $this->request->workplace_id)
            ->get();

        if ($data->count() > 0) {
            return false;
        }

         return true;
    }

}