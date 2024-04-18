<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'status',
        'role',
        'profile_photo',
    ];

    public function patientsData(){
        return $this->hasOne(PatientsData::class, 'user_id');
    }

    public function patientsDentalRecord(){
        return $this->hasOne(PatientDentalRecord::class, 'service_by_user_id', 'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
