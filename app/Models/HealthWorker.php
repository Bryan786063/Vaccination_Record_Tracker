<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthWorker extends Model
{
    protected $primaryKey = 'worker_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'license_no',
        'contact',
        'role'
    ];

    public function records()
    {
        return $this->hasMany(VaccinationRecord::class, 'worker_id');
    }
}
