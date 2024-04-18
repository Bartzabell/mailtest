<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentistsData extends Model
{
    use HasFactory;

    public function pdr()
    {
        return $this->hasMany(PatientDentalRecord::class, 'dentist_id', 'id');
    }

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'extension_name',
        'license_number',
        'user_id',

    ];
}
