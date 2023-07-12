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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('profile_picture')->nullable();
            $table->string('identification')->unique();
            $table->date('date_of_birth');
            $table->string('agency_name');
            $table->string('agency_phone_number');
            $table->string('agency_email');
            $table->string('agency_address');
            $table->string('agency_license')->unique();
            $table->integer('years_of_experience');
            $table->string('qualifications')->nullable();
            $table->string('educational_background')->nullable();
            $table->text('property_types')->nullable();
            $table->text('geographic_areas')->nullable();
            $table->text('languages')->nullable();
            $table->text('references')->nullable();
            $table->text('reviews')->nullable();
            $table->boolean('background_check')->default(false);
            $table->boolean('compliance_documentation')->default(false);
            $table->boolean('terms_accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
