<?php

namespace App\Http\Controllers\Admin;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminInquiries extends Controller
{
    public function index()
    {
        $page_title = 'Inquiries';

        $inquiries = Inquiry::all();

        return view('admin.inquiries', [
            'page_title' => $page_title,
            'inquiries' => $inquiries,
        ]);
    }
}
