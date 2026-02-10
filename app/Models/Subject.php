<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{   
    public $timestamps = false;
    protected $primaryKey = 'id_subject';
    protected $fillable = [
        'name_subject',
        'elective_subject'
    ];
}
