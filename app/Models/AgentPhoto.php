<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgentPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['agent_id', 'image_path'];

    /**
     * Get the property associated with the image.
     */
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
}
