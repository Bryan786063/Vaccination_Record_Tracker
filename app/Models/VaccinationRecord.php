<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaccinationRecord extends Model
{
    protected $primaryKey = 'record_id';

    protected $fillable = [
        'patient_id',
        'vaccine_id',
        'batch_id',
        'worker_id',
        'dose_number',
        'date_given',
        'status',
        'remarks'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class, 'vaccine_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function worker()
    {
        return $this->belongsTo(HealthWorker::class, 'worker_id');
    }
}
