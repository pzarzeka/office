<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $appends = ['user_name', 'workplace_name'];

    protected $table = 'reservations';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workplace()
    {
        return $this->belongsTo(Workplace::class);
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }

    public function getWorkplaceNameAttribute()
    {
        return $this->workplace->name;
    }

}