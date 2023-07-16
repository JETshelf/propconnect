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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->string('property_name');
            $table->string('property_location');
            $table->text('property_description');
            $table->string('property_type');
            $table->decimal('price_rent', 8, 2);
            $table->integer('bedrooms');
            $table->integer('square_ft');
            $table->integer('car_parking');
            $table->integer('year_built');
            $table->text('property_address');
            $table->integer('dining_room')->nullable();
            $table->integer('kitchen')->nullable();
            $table->integer('living_room')->nullable();
            $table->integer('master_bedroom')->nullable();
            $table->integer('bedroom_2')->nullable();
            $table->integer('other_room')->nullable();
            $table->boolean('swimming_pool')->default(false);
            $table->boolean('terrace')->default(false);
            $table->boolean('air_conditioning')->default(false);
            $table->boolean('internet')->default(false);
            $table->boolean('balcony')->default(false);
            $table->boolean('cable_tv')->default(false);
            $table->boolean('computer')->default(false);
            $table->boolean('dishwasher')->default(false);
            $table->boolean('near_green_zone')->default(false);
            $table->boolean('near_church')->default(false);
            $table->boolean('near_estate')->default(false);
            $table->boolean('coffee_pot')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
