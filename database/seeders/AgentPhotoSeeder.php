<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\AgentPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgentPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $imageDirectory = 'assets/images/sm/'; // Update the image directory path
        $agents = Agent::all(); // Get all agents

        foreach ($agents as $agent) {
            $randomImages = $this->getRandomImages($imageDirectory, 1); // Change the count to 1 for a single agent photo

            foreach ($randomImages as $image) {
                $imagePath = Storage::putFile('public/agent_photos', $image, 'public'); // Update the storage path to 'public/agent_photos'
                $agentImage = new AgentPhoto();
                $agentImage->agent_id = $agent->id;
                $agentImage->image_path = str_replace('public/', '', $imagePath);
                $agentImage->save();
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
