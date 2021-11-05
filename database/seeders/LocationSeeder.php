<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name'     => 'BOG',
            'regio'     => 'centrum',
            
        ]);
        Location::create([
            'name'     => 'AZP checkpoint',
            'regio'     => 'centrum',
            
        ]);
        Location::create([
            'name'     => 'RZW',
            'regio'     => 'wanica',
            
        ]);
        Location::create([
            'name'     => 'Tropical clinic Parbo',
            'regio'     => 'centrum',
            
        ]);
        Location::create([
            'name'     => 'MMC Nickerie',
            'regio'     => 'nickerie',
            
        ]);

    
    }
}