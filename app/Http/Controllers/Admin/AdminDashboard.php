<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Inquiry;

class AdminDashboard extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';

        $properties = Property::all()->count();
        $agents = Agent::all()->count();
        $inquiries = Inquiry::all()->count();

        return view('admin.dashboard', [
            'page_title' => $page_title,
            'properties' => $properties,
            'agents' => $agents,
            'inquiries' => $inquiries,
        ]);
    }
}
