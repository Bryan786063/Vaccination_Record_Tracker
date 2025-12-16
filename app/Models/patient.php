<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'patient_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'dob',
        'contact',
        'eligibility_status',
        'notes'
    ];

    public function records()
    {
        return $this->hasMany(VaccinationRecord::class, 'patient_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'patient_id');
    }
}
