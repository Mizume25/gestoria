<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('student_subject', function (Blueprint $table) {
    $table->unsignedBigInteger('id_student');
    $table->unsignedBigInteger('id_subject'); // Sin el "10" dentro
    
    $table->double('subject_grade')->nullable()->default(null);
    $table->enum('trimester', ['1', '2', '3']);

    $table->primary(['id_student', 'id_subject']); // Corregido el nombre

    $table->foreign('id_student')->references('id_student')->on('students')->onDelete('cascade');
    $table->foreign('id_subject')->references('id_subject')->on('subjects')->onDelete('cascade');
});
}

    
    public function down(): void
    {
        Schema::dropIfExists('student_subject');
    }
};
