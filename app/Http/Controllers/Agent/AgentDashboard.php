<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentDashboard extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';

        return view('agent.dashboard', [
            'page_title' => $page_title,
        ]);
    }
}
