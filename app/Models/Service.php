<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'duration'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'service_id');
    }

    public function pdrDetails()
    {
        return $this->belongsToMany(pdrDetail::class, 'service_id', 'id');
    }



}
