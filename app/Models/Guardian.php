<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'patient_id', 'name', 'email', 'phone', 'relationship', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}