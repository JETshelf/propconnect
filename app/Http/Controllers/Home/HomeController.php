<?php

namespace App\Http\Controllers\Home;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $page_title = 'Home';

        $properties = Property::all();

        return view('home.index', [
            'page_title' => $page_title,
            'properties' => $properties,
        ]);
    }

    public function view($id)
    {
        $page_title = 'View Property';

        $property = Property::findOrFail($id);

        return view('home.view_property', [
            'page_title' => $page_title,
            'property' => $property,
        ]);
    }
}
