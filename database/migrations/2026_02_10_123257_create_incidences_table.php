<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
public function up(): void
{
    Schema::create('incidences', function (Blueprint $table) {
       
        $table->id('id_incidence'); 
        
        $table->unsignedBigInteger('id_student');
        $table->char('code_incidence', 20);
        $table->string('type_incidence', 100);
        $table->date('date_incidence')->nullable(); 
        $table->text('details')->nullable();        

        
        $table->foreign('id_student')
              ->references('id_student')
              ->on('students')
              ->onUpdate('cascade')
              ->onDelete('restrict'); 
    });
}

   
    public function down(): void
    {
        Schema::dropIfExists('incidences');
    }
};
