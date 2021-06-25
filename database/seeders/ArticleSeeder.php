<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Str;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('articles')->insert([
                'nom' => 'Produit ' . ($i+1),
                'description' => Str::random(50),
                'description_detaillee' => Str::random(100),
                'image' => 'logo.png',
                'gamme_id' => 1,
                'prix' => mt_rand(5, 1000),
                'stock' => 50,
                'note' => 4.5,
            ]);
        }
    }
}
