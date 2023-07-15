<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'image_path'];

    /**
     * Get the property associated with the image.
     */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
    
}
