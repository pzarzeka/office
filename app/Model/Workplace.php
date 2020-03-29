<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
    public $appends = ['equipments_list', 'equipments_count'];

    protected $table = 'workplaces';

    protected $fillable = ['name', 'description'];

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function reservations()
    {
//        return $this->hasMany(Reservation::class);
    }

    public function getEquipmentsCountAttribute()
    {
        return $this->equipments()->count();
    }

    public function getEquipmentsListAttribute()
    {
        if ($this->getEquipmentsCountAttribute() === 0) {
            return '';
        }

        $equipmentsList = '';
        foreach ($this->equipments as $equipment) {
            $equipmentsList .= '- ' . $equipment->name . '<br />';
        }

        return $equipmentsList;
    }

}