<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{

    protected $table = 'equipments';

    protected $guarded = [];

    public function workplace()
    {
        return $this->belongsTo(Workplace::class)->withDefault(['name' => '-']);
    }

}