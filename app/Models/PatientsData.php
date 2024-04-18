<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PatientsData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'extension_name',
        'phone_number',
        'birthdate',
        'sex',
        'province_id',
        'city_id',
        'barangay_id',

    ];

    public function users(): BelongsTo{

        return $this->belongsTo(User::class, 'user_id');
    }

    public function province(): HasOne{

        return $this->hasOne(PhilippineProvinces::class, 'id', 'province_id');
    }

    public function city(): HasOne{

        return $this->hasOne(PhilippineCities::class, 'id', 'city_id');
    }

    public function barangay(): HasOne{

        return $this->hasOne(PhilippineBarangays::class, 'id', 'barangay_id');
    }
}
