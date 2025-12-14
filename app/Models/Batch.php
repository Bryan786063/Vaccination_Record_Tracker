<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $primaryKey = 'batch_id';

    protected $fillable = [
        'vaccine_id',
        'batch_number',
        'expiry_date',
        'quantity',
        'received_date'
    ];

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class, 'vaccine_id');
    }

    public function records()
    {
        return $this->hasMany(VaccinationRecord::class, 'batch_id');
    }
}
