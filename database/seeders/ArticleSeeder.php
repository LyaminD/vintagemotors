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

        DB::table('articles')->insert([
            'nom' => 'Fireblade',
            'description' => 'En mettre plein la vue !',
            'description_detaillee' => Str::random(100),
            'image' => 'custom1.jpg',
            'gamme_id' => 3,
            'prix' => 9850,
            'stock' => 10,
            'note' => 3.5,

        ]);
        DB::table('articles')->insert([
            'nom' => 'Stomper',
            'description' => 'Vous laisserez qu\'un nuage de fumée !',
            'description_detaillee' => Str::random(100),
            'image' => 'custom2.jpg',
            'gamme_id' => 3,
            'prix' => 11450,
            'stock' => 10,
            'note' => 4.5,

        ]);
        DB::table('articles')->insert([
            'nom' => 'Defcon',
            'description' => 'Tous le monde va se retourner !',
            'description_detaillee' => Str::random(100),
            'image' => 'custom3.jpg',
            'gamme_id' => 3,
            'prix' => 12589,
            'stock' => 10,
            'note' => 4.5,

        ]);

        DB::table('articles')->insert([
            'nom' => 'Choom',
            'description' => 'La classe à l\'état pure !',
            'description_detaillee' => Str::random(100),
            'image' => 'moto1bmw.jpg',
            'gamme_id' => 1,
            'prix' => 8963,
            'stock' => 10,
            'note' => 4,

        ]);
        DB::table('articles')->insert([
            'nom' => 'Nova',
            'description' => 'Ne vous laissera pas indifférent !',
            'description_detaillee' => Str::random(100),
            'image' => 'moto8bmw.jpg',
            'gamme_id' => 1,
            'prix' => 11489,
            'stock' => 10,
            'note' => 4,

        ]);
        DB::table('articles')->insert([
            'nom' => 'F900',
            'description' => 'Un chef d\'oeuvre !',
            'description_detaillee' => Str::random(100),
            'image' => 'moto9bmw.jpg',
            'gamme_id' => 1,
            'prix' => 12565,
            'stock' => 10,
            'note' => 4.5,

        ]);

        DB::table('articles')->insert([
            'nom' => 'Nagasaki',
            'description' => 'Une vraie bombe !',
            'description_detaillee' => Str::random(100),
            'image' => 'ratbike1.jpg',
            'gamme_id' => 5,
            'prix' => 8569,
            'stock' => 10,
            'note' => 3.5,

        ]);
        DB::table('articles')->insert([
            'nom' => 'Tcherno',
            'description' => 'Terminator mais en mieux !',
            'description_detaillee' => Str::random(100),
            'image' => 'ratbike2.jpg',
            'gamme_id' => 5,
            'prix' => 10369,
            'stock' => 10,
            'note' => 4,

        ]);
        DB::table('articles')->insert([
            'nom' => 'Alpha',
            'description' => 'Du steampunk de rêve !',
            'description_detaillee' => Str::random(50),
            'image' => 'ratbike3.jpg',
            'gamme_id' => 5,
            'prix' => 11478,
            'stock' => 10,
            'note' => 4.5,

        ]);

        DB::table('articles')->insert([
            'nom' => 'Transalp',
            'description' => 'En mettre plein la vue !',
            'description_detaillee' => Str::random(100),
            'image' => 'moto4cadillac.jpg',
            'gamme_id' => 2,
            'prix' => 9879,
            'stock' => 10,
            'note' => 3,

        ]);
        DB::table('articles')->insert([
            'nom' => 'Dream',
            'description' => 'Puissance et sobriété !',
            'description_detaillee' => Str::random(100),
            'image' => 'moto6cadillac.jpg',
            'gamme_id' => 2,
            'prix' => 11456,
            'stock' => 10,
            'note' => 4,

        ]);
        DB::table('articles')->insert([
            'nom' => 'CRF',
            'description' => 'Légendaire !',
            'description_detaillee' => Str::random(100),
            'image' => 'moto7cadillac.jpg',
            'gamme_id' => 2,
            'prix' => 13204,
            'stock' => 10,
            'note' => 4.5,

        ]);

        DB::table('articles')->insert([
            'nom' => 'FatBoy',
            'description' => 'Un clasique revisité !',
            'description_detaillee' => Str::random(100),
            'image' => 'moto3harley.jpg',
            'gamme_id' => 4,
            'prix' => 10456,
            'stock' => 10,
            'note' => 3,

        ]);
        DB::table('articles')->insert([
            'nom' => 'Wing',
            'description' => 'Une légende urbaine !',
            'description_detaillee' => Str::random(100),
            'image' => 'moto2harley.jpg',
            'gamme_id' => 4,
            'prix' => 11456,
            'stock' => 10,
            'note' => 4,

        ]);
        DB::table('articles')->insert([
            'nom' => 'Iron',
            'description' => 'Le rêve de tous humains !',
            'description_detaillee' => Str::random(100),
            'image' => 'moto5harley.jpg',
            'gamme_id' => 4,
            'prix' => 12365,
            'stock' => 10,
            'note' => 4.5,
        ]);
    }
}
