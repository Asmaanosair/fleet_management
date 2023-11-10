<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = [
            ['station_from_id'=>Station::whereStation('Cairo')->first()->id,
            'station_to_id'=>Station::whereStation('Asyut')->first()->id],
        ];
        Trip::insert($stations);
    }
}
