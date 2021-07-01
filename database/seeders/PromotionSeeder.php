<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            'nom' => 'Promos “départ en vacances”',
            'date_debut' => '2021-07-01',
            'date_fin' => '2021-07-07',
            'reduction' => '20',

        ]);
        DB::table('promotions')->insert([
            'nom' => 'Soldes d\'été',
            'date_debut' => '2021-07-08',
            'date_fin' => '2021-07-31',
            'reduction' => '15',

        ]);
    }
}
