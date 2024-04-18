<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentistsAvailabity extends Model
{
    use HasFactory;

    protected $fillable = [
        'dentist_id',
        'date_time_start',
        'date_time_end',

    ];
}
