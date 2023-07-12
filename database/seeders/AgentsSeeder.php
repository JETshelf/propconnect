<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agent;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $agentData = [
                'full_name' => $faker->name(),
                'phone_number' => $faker->phoneNumber(),
                'email' => $faker->unique()->safeEmail(),
                'address' => $faker->address(),
                'identification' => 'Agent Identification ' . ($i + 1),
                'zip_code' => $faker->postcode(),
                'agency_name' => $faker->company(),
                'agency_phone_number' => $faker->phoneNumber(),
                'agency_email' => $faker->unique()->safeEmail(),
                'agency_address' => $faker->address(),
                'agency_license' => 'Agency License ' . ($i + 1),
                'years_of_experience' => $faker->numberBetween(1, 10),
                'background_check' => ($i % 2 == 0) ? true : false,
                'compliance_documentation' => ($i % 2 == 0) ? true : false,
                'terms_accepted' => true,
            ];

            $agent = new Agent();
            $agent->fill($agentData);
            $agent->save();

            // Assign the default password
            $password = "12345678.";

            // Encrypt the password using Laravel's built-in Hash facade
            $encryptedPassword = Hash::make($password);

            // Create a new user
            $user = new User;
            $user->name = $agentData['full_name'];
            $user->username = $agentData['email'];
            $user->email = $agentData['email'];
            $user->mobile = $agentData['phone_number'];
            $user->password = $encryptedPassword;

            // Assign Role
            $userRole = Role::where('name', 'Agent')->first();
            $user->assignRole($userRole);

            // Generate an email password reset token
            $token = Str::random(64);

            // Insert email and token in password resets table
            PasswordReset::create([
                'email' => $agentData['email'],
                'token' => $token,
            ]);

            // Save the new user
            $user->save();
        }
    }
}
