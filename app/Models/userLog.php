<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $primaryKey = 'log_id';

    public $timestamps = false; // because we used created_at only

    protected $fillable = [
        'user_id',
        'action',
        'record_type',
        'record_id',
        'schedule_id',
        'details'
    ];

    public function user()
    {
        return $this->belongsTo(SystemUser::class, 'user_id');
    }
}
