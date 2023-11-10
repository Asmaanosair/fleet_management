<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => Hash::make('12345678'),
         ]);
        $this->call(StationSeeder::class);
        $this->call(TripSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(SeatSeeder::class);
        $this->call(BusSeeder::class);
        $this->call(BusSeatSeeder::class);
    }
}
