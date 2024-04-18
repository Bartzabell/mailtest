<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToothCondition extends Model
{
    protected $table = 'tooth_condition';

    protected $fillable = [
        'name',
        'color',
    ];
}
