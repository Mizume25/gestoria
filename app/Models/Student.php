<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_student'; 
    public $timestamps = false;
    
    //Modelo de Estudiante
    protected $fillable = [
        'name',
        'last_name',
        'age',
        'grade',
        'fecha_matricula'
    ];

    //Relaciona con tabla intermedia
    public function subjects()
    {
        return $this->belongsToMany(
            Subject::class,      
            'student_subject',  
            'id_student',       
            'id_subject'        
        )
        ->withPivot('subject_grade'); 
        
        
    }
}
