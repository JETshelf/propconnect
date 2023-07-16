<?php

namespace App\Http\Controllers\Agent;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentInquiries extends Controller
{
    public function index()
    {
        $page_title = 'Inquiries';

        $agentId = session('agent_id');

        $inquiries = Inquiry::whereHas('property', function ($query) use ($agentId) {
            $query->where('agent_id', $agentId);
        })->get();

        return view('agent.inquiries', [
            'page_title' => $page_title,
            'inquiries' => $inquiries,
        ]);
    }

}
