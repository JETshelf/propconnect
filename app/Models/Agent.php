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
        'identification',
        'zip_code',
        'agency_name',
        'agency_phone_number',
        'agency_email',
        'agency_address',
        'agency_license',
        'years_of_experience',
        'background_check',
        'compliance_documentation',
        'terms_accepted',
    ];

    public function photo()
    {
        return $this->hasOne(AgentPhoto::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
