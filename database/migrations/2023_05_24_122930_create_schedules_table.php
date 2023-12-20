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
            Schema::create('schedules', function (Blueprint $table) {
                $table->id();
                $table->integer('hospitalId');
                $table->integer('doctorId');
                $table->string('day');
                $table->string('beforeLunchInTime')->nullable();
                $table->string('beforeLunchOutTime')->nullable();
                $table->string('afterLunchInTime')->nullable();
                $table->string('afterLunchOutTime')->nullable();
                $table->string('holiday')->default('No');
                $table->string('status')->default('Active');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
