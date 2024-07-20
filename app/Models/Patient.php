<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{   
    use Notifiable;
    use HasFactory;

    public function routeNotificationForMail(Notification $notification): array|string
    {
        // Return email address only...
        return $this->email_wali;
 
        // Return email wali and name...
        return [$this->email_wali => $this->nama_wali];
    }
    
    protected $primaryKey = 'patient_id';

    protected $fillable = [
        'nama_balita', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'nama_wali', 'telepon_wali', 'email_wali', 'tinggi_badan_lahir', 'berat_badan_lahir', 'lingkar_kepala',
    ];

    public function immunizationRecords()
    {
        return $this->hasMany(ImmunizationRecord::class, 'patient_id', 'patient_id');
    }
}