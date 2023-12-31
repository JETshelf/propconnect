<?php

namespace App\Http\Controllers\Agent;

use App\Models\Agent;
use App\Models\Inquiry;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentDashboard extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';

        $agentId = session('agent_id');

        $properties = Property::where('agent_id', $agentId)->count();


        $inquiries = Inquiry::whereHas('property', function ($query) use ($agentId) {
            $query->where('agent_id', $agentId);
        })->count();

        return view('agent.dashboard', [
            'page_title' => $page_title,
            'properties' => $properties,
            'inquiries' => $inquiries,
        ]);
    }
}
