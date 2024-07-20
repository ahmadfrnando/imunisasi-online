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
    ];
}