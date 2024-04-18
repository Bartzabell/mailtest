<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PdrDetail extends Model
{
    use HasFactory;

    public function pdr()
    {
        return $this->belongsTo(PatientDentalRecord::class, 'pdr_id',  'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'pdr_details', 'pdr_id', 'service_id');
    }
}
