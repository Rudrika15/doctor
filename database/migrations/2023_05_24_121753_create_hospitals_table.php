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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('hospitalName');
            $table->string('slug');
            $table->longText('address');
            $table->integer('cityId');
            $table->string('contactNo');
            $table->integer('hospitalTypeId');
            $table->integer('userId');
            $table->string('siteUrl');
            $table->integer('categoryId');
            $table->string('hospitalLogo');
            $table->string('hospitalTime');
            $table->string('services');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
