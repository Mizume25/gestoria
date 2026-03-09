<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    //Propiedades de la entidad: Student
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {

        $table->id('id_student'); 
        $table->string('name');
        $table->string('last_name');      
        $table->integer('age');          
        $table->string('grade');          
        $table->date('fecha_matricula');  
        $table->string('email')->unique()->nullable(); 
         $table->string('password')->nullable();
        $table->timestamps();          
    });
        
    }


    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
