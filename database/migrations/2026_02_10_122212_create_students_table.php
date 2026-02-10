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
            $table->string('name', 255);
            $table->string("last_name",255);
            $table->unsignedInteger('age');
            $table->enum('grade', ['Year 1', 'Year 2', 'Year 3', 'Year 4']);
            $table->date('fecha_matricula');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
