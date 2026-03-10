<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Teacher extends Model
{   
    use HasFactory;
    protected $primaryKey = 'id_teacher';

     protected $fillable = [
        'name',
        'last_name',
        'age',
        'group',
        'fecha_contratacion',
        'email',
        'password',
        'salary'
    ];
}
