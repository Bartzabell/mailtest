<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhilippineCities extends Model
{
    use HasFactory;

    public function patientData(): BelongsTo{

        return $this->belongsTo(PatientsData::class);
    }

    protected $fillable = [
        'city_description',
    ];
}
