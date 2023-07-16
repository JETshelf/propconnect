<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyImage;
use App\Http\Controllers\Controller;

class AdminProperties extends Controller
{
    public function index()
    {
        $page_title = 'Properties';

        $properties = Property::all();

        return view('admin.properties', [
            'page_title' => $page_title,
            'properties' => $properties,
        ]);
    }

    public function create()
    {
        $page_title = 'Add New Property';

        return view('admin.add_property', [
            'page_title' => $page_title,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the user's inputs
        $validatedData = $request->validate([
            'property_name' => 'required|string',
            'property_location' => 'required|string',
            'property_description' => 'required|string',
            'property_type' => 'required|string',
            'price_rent' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'square_ft' => 'required|integer',
            'car_parking' => 'required|integer',
            'year_built' => 'required|integer',
            'property_address' => 'required|string',
            'dining_room' => 'nullable|integer',
            'kitchen' => 'nullable|integer',
            'living_room' => 'nullable|integer',
            'master_bedroom' => 'nullable|integer',
            'bedroom_2' => 'nullable|integer',
            'other_room' => 'nullable|integer',
            'swimming_pool' => 'boolean',
            'terrace' => 'boolean',
            'air_conditioning' => 'boolean',
            'internet' => 'boolean',
            'balcony' => 'boolean',
            'cable_tv' => 'boolean',
            'computer' => 'boolean',
            'dishwasher' => 'boolean',
            'near_green_zone' => 'boolean',
            'near_church' => 'boolean',
            'near_estate' => 'boolean',
            'coffee_pot' => 'boolean',
        ]);


        // dd($request->hasFile('property_images'));

        // Create a new property
        $property = new Property();
        $property->fill($validatedData); // Fill the property attributes with the validated data
        $property->save(); // Save the property to the database


        // Store the property images
        if ($request->hasFile('property_images')) {
            foreach ($request->file('property_images') as $image) {
                $imagePath = $image->store('property_images', 'public');
                $propertyImage = new PropertyImage();
                $propertyImage->property_id = $property->id;
                $propertyImage->image_path = $imagePath;
                $propertyImage->save();
            }
        }

        return redirect()
            ->route('admin.properties')
            ->with(['success' => 'Property added successfully.']);
    }


    public function view($id)
    {
        $page_title = 'View Property';

        $property = Property::findOrFail($id);

        return view('admin.view_property', [
            'page_title' => $page_title,
            'property' => $property,
        ]);
    }

    public function edit($id)
    {
        $page_title = 'Edit Property';

        $property = Property::findOrFail($id);

        return view('admin.edit_property', [
            'page_title' => $page_title,
            'property' => $property,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate the user's inputs
        $validatedData = $request->validate([
            'property_name' => 'required|string',
            'property_location' => 'required|string',
            'property_description' => 'required|string',
            'property_type' => 'required|string',
            'price_rent' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'square_ft' => 'required|integer',
            'car_parking' => 'required|integer',
            'year_built' => 'required|integer',
            'property_address' => 'required|string',
            'dining_room' => 'nullable|integer',
            'kitchen' => 'nullable|integer',
            'living_room' => 'nullable|integer',
            'master_bedroom' => 'nullable|integer',
            'bedroom_2' => 'nullable|integer',
            'other_room' => 'nullable|integer',
            'swimming_pool' => 'boolean',
            'terrace' => 'boolean',
            'air_conditioning' => 'boolean',
            'internet' => 'boolean',
            'balcony' => 'boolean',
            'cable_tv' => 'boolean',
            'computer' => 'boolean',
            'dishwasher' => 'boolean',
            'near_green_zone' => 'boolean',
            'near_church' => 'boolean',
            'near_estate' => 'boolean',
            'coffee_pot' => 'boolean',
            'property_images.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Validation rule for multiple property images
        ]);

        // Update the property
        $property = Property::findOrFail($id);
        $property->fill($validatedData); // Fill the property attributes with the validated data
        $property->save(); // Save the property to the database

        // Store the property images
        if ($request->hasFile('property_images')) {
            foreach ($request->file('property_images') as $image) {
                $imagePath = $image->store('property_images', 'public');
                $propertyImage = new PropertyImage();
                $propertyImage->property_id = $property->id;
                $propertyImage->image_path = $imagePath;
                $propertyImage->save();
            }
        }

        return redirect()
            ->route('admin.properties')
            ->with(['success' => 'Property updated successfully.']);
    }


    public function delete($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()
            ->route('admin.properties')
            ->with(['success' => 'Property deleted successfully.']);
    }
}
