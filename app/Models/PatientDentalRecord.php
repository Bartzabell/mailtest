<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientDentalRecord extends Model
{
    use HasFactory;

    public function users(): BelongsTo{

        return $this->belongsTo(User::class);
    }

    public function pdrDetail()
    {
        return $this->hasMany(PdrDetail::class, 'pdr_id', 'id');
    }

    public function dentistData()
    {
        return $this->belongsTo(DentistsData::class, 'dentist_id',  'id');
    }

    // public function services()
    // {
    //     return $this->belongsToMany(Service::class, 'pdr_details', 'pdr_id', 'service_id');
    // }
}
