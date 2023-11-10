<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seatIds =Seat::pluck('id')->toArray();
        $buses =Bus::all();
        foreach ($buses as $bus){
            $bus->seats()->attach($seatIds);
        }
    }
}
