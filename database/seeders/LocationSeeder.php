<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Location::truncate();
        $csvData = fopen(base_path('database/csv/locations.csv'), 'r');
        $transRow = false;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Location::create([
                    'name' => $data['0'],
                    'latitude' => $data['1'],
                    'longitude' => $data['2'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
