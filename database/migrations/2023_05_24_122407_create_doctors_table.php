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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->integer('hospitalId');
            $table->string('slug');
            $table->string('doctorName')->nullable();
            $table->string('contactNo')->nullable();
            $table->integer('specialistId')->nullable();
            $table->integer('userId');
            $table->string('photo')->nullable();
            $table->string('experience')->nullable();
            $table->string('registerNumber')->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
