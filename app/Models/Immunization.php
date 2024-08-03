<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
{
    use HasFactory;
    protected $primaryKey = 'immunization_id';

    protected $fillable = [
        'nama_vaksin',
        'usia_tepat_terpenuhi',
        'usia_masih_dibolehkan',
        'usia_pemberian_imunisasi_kejar',
        'usia_tidak_dibolehkan',
    ];
}