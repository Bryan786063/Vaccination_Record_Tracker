<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $primaryKey = 'vaccine_id';

    protected $fillable = [
        'name',
        'manufacturer',
        'doses_required',
        'notes'
    ];

    public function batches()
    {
        return $this->hasMany(Batch::class, 'vaccine_id');
    }

    public function records()
    {
        return $this->hasMany(VaccinationRecord::class, 'vaccine_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'vaccine_id');
    }
}