<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'address',
        'profile_picture',
        'identification',
        'date_of_birth',
        'agency_name',
        'agency_phone_number',
        'agency_email',
        'agency_address',
        'agency_license',
        'years_of_experience',
        'qualifications',
        'educational_background',
        'property_types',
        'geographic_areas',
        'languages',
        'references',
        'reviews',
        'background_check',
        'compliance_documentation',
        'terms_accepted',
    ];
}
