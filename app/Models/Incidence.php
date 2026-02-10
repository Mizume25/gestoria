<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    protected $fillable = [
        'type_incidence',
        'date_incidence',
        'details'
    ];
}
