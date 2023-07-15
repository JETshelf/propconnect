<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PropertyImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageDirectory = 'assets/images/image-gallery/';
        $properties = Property::all();

        foreach ($properties as $property) {
            $randomImages = $this->getRandomImages($imageDirectory, 3);

            foreach ($randomImages as $image) {
                $imagePath = Storage::putFile('public/property_images', $image, 'public');
                $propertyImage = new PropertyImage();
                $propertyImage->property_id = $property->id;
                $propertyImage->image_path = str_replace('public/', '', $imagePath);
                $propertyImage->save();
            }
        }
    }

    private function getRandomImages($directory, $count)
    {
        $files = File::files(public_path($directory));
        $randomFiles = collect($files)->random($count);

        return $randomFiles->map(function ($file) {
            return $file->getPathname();
        })->toArray();
    }
}
