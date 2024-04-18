<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToothChart extends Model
{
    use HasFactory;

    protected $table = 'toothchart';

    protected $fillable = [
        'name',
        'condition_id',
    ];
}
