<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCheck extends Model
{
    use HasFactory;

    protected $primaryKey = 'check_id';

    protected $fillable = [
        'patient_id', 'keluhan', 'diagnosis', 'pengobatan', 'tanggal_periksa',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }
}