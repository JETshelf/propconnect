<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'name', 'mobile_no', 'email', 'message'];

    // Define the relationship with the Property model
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
