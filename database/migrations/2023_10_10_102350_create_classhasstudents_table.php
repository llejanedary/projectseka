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
        Schema::create('classhasstudents', function (Blueprint $table) {
            $table->unsignedBigInteger('idClassroom'); 
            $table->unsignedBigInteger('idStudent'); 
            $table->foreign('idStudent')->references('id')->on('students');
            $table->foreign('idClassroom')->references('id')->on('classrooms');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classhasstudents');
    }
};
