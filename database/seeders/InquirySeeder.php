<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use App\Models\Property;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $properties = Property::all();

        foreach ($properties as $property) {
            $inquiryCount = rand(1, 4);

            for ($i = 0; $i < $inquiryCount; $i++) {
                Inquiry::create([
                    'property_id' => $property->id,
                    'name' => $faker->name,
                    'mobile_no' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'message' => $faker->paragraph,
                ]);
            }
        }
    }
}
