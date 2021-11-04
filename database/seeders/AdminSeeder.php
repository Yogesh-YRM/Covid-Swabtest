<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'voornaam'     => 'Administrator',
            'achternaam'     => 'Admin',
            'email'    => 'admin@example.com',
            'role'    => 'admin',
            'password' => bcrypt('password'),
        ]);


        Admin::create([
            'voornaam'     => 'Shivan',
             'achternaam'     => 'Bhagwandin',
             'email'    => 'shivan_bhagwandin@example.com',
             'role'    => 'medical',
             'password' => bcrypt('password'),
        ]);

        Admin::create([
              'voornaam'     => 'Denzil',
              'achternaam'     => 'Rasidin',
              'email'    => 'denzil_rasidin@example.com',
              'role'    => 'scanner',
              'password' => bcrypt('password'),

        ]);
    }
}
