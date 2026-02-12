<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserKey extends Model
{
    protected $fillable = [
        'id_student',
        'id_user'
    ];
}
