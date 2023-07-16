<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_name',
        'property_location',
        'property_description',
        'property_type',
        'price_rent',
        'bedrooms',
        'square_ft',
        'car_parking',
        'year_built',
        'property_address',
        'dining_room',
        'kitchen',
        'living_room',
        'master_bedroom',
        'bedroom_2',
        'other_room',
        'swimming_pool',
        'terrace',
        'air_conditioning',
        'internet',
        'balcony',
        'cable_tv',
        'computer',
        'dishwasher',
        'near_green_zone',
        'near_church',
        'near_estate',
        'coffee_pot',
    ];

    public function propertyImages()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
