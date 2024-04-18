<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhilippineBarangays extends Model
{
    use HasFactory;

    public function patientData(): BelongsTo{

        return $this->belongsTo(PatientsData::class);
    }

    protected $fillable = [
        'barangay_description',
    ];

}
