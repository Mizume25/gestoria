<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {

            $table->id('id_teacher');
            $table->string('name');
            $table->string('last_name');
            $table->integer('age');
            $table->string('group');
            $table->date('fecha_contratacion');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
