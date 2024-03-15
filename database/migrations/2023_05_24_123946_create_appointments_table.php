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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('contactNo');
            $table->integer('categoryId');
            $table->integer('stateId');
            $table->integer('cityId');
            $table->integer('hospitalId');
            $table->integer('doctorId');
            $table->integer('scheduleId');
            $table->dateTime('appointmentDate');
            $table->string('message');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
