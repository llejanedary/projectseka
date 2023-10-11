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
        Schema::create('classroomhas_tas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ta');
            $table->unsignedBigInteger('idClassroom');
            $table->foreign('id_ta')->references('id')->on('tas');
            $table->foreign('idClassroom')->references('id')->on('classrooms');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroomhas_tas');
    }
};
