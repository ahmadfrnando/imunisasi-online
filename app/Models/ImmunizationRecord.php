<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImmunizationRecord extends Model
{   
    protected $table = 'immunization_records';
    use HasFactory;

    protected $primaryKey = 'record_id';

    protected $fillable = [
        'patient_id', 'immunization_id', 'usia_saat_pemberian' , 'tinggi_badan', 'berat_badan', 'lingkar_kepala', 'petugas_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }

    public function immunization()
    {
        return $this->belongsTo(Immunization::class, 'immunization_id', 'immunization_id');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id', 'id');
    }
}