<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Property;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $validLocations = [
            'Langata',
            'Karen',
            'Runda',
            'Muthaiga',
            'Parklands',
            'Westlands',
            'Kilimani',
            'Hurlingham',
            'Lavington',
            'Kileleshwa',
        ];

        $nairobiPropertyNames = [
            'Magnolia House',
            'The Penthouse',
            'The Garden Villa',
            'The Townhouse',
            'The Apartment',
            'The Cottage',
            'The Mansion',
            'The Villa',
            'The Bungalow',
            'The Estate',
        ];

        $nairobiAddresses = [
            '10000 Ngong Road',
            '14444 Waiyaki Way',
            '12345 Kenyatta Avenue',
            '67890 Mombasa Road',
            '43210 Thika Road',
            '98765 Jogoo Road',
            '32109 Moi Avenue',
            '76543 Ngong Road',
            '54321 Kiambu Road',
            '32109 Uhuru Highway',
        ];

        $agentIds = Agent::pluck('id')->toArray(); // Get an array of agent IDs

        for ($i = 0; $i < 25; $i++) {
            $property = [
                'property_name' => $faker->randomElement($nairobiPropertyNames) . ', Nairobi',
                'property_location' => $faker->randomElement($validLocations),
                'property_description' => $faker->paragraph(),
                'property_type' => $faker->randomElement(['For Rent', 'For Sale']),
                'price_rent' => $faker->randomFloat(2, 10000, 300000),
                'bedrooms' => $faker->numberBetween(1, 5),
                'square_ft' => $faker->numberBetween(1000, 5000),
                'car_parking' => $faker->numberBetween(1, 2),
                'year_built' => $faker->year(),
                'property_address' => $faker->randomElement($nairobiAddresses),
                'dining_room' => $faker->numberBetween(0, 1),
                'kitchen' => $faker->numberBetween(0, 1),
                'living_room' => $faker->numberBetween(0, 1),
                'master_bedroom' => $faker->numberBetween(0, 1),
                'bedroom_2' => $faker->numberBetween(0, 1),
                'other_room' => $faker->numberBetween(0, 1),
                'swimming_pool' => $faker->boolean(),
                'terrace' => $faker->boolean(),
                'air_conditioning' => $faker->boolean(),
                'internet' => $faker->boolean(),
                'balcony' => $faker->boolean(),
                'cable_tv' => $faker->boolean(),
                'computer' => $faker->boolean(),
                'dishwasher' => $faker->boolean(),
                'near_green_zone' => $faker->boolean(),
                'near_church' => $faker->boolean(),
                'near_estate' => $faker->boolean(),
                'coffee_pot' => $faker->boolean(),
            ];

            $property['property_description'] = sprintf(
                "This spacious %s is located in the heart of %s. It is a short walk to all the amenities you need, including schools, shops, and restaurants. The property features %d bedrooms, %d bathrooms, and a large living room with a fireplace. There is also a private garden and a swimming pool.",
                $property['property_type'],
                $property['property_location'],
                $property['bedrooms'],
                $property['bedrooms']
            );

            $property['agent_id'] = $faker->randomElement($agentIds); // Assign a random agent ID

            Property::create($property);
        }
    }
}
