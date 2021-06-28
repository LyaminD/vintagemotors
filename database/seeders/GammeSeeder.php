<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gammes')->insert([
            'nom' => 'BMW',
        ]);

        DB::table('gammes')->insert([
            'nom' => 'Cadillac',
        ]);

        DB::table('gammes')->insert([
            'nom' => 'Custom',
        ]);

        DB::table('gammes')->insert([
            'nom' => 'Harley',
        ]);

        DB::table('gammes')->insert([
            'nom' => 'Ratbike',
        ]);

    }
}
