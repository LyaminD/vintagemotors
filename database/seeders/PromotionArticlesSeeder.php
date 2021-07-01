<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotion_articles')->insert([
            'promotion_id' => '1',
            'article_id' => '1',
        ]);
        DB::table('promotion_articles')->insert([
            'promotion_id' => '1',
            'article_id' => '4',
        ]);
        DB::table('promotion_articles')->insert([
            'promotion_id' => '1',
            'article_id' => '7',
        ]);
        DB::table('promotion_articles')->insert([
            'promotion_id' => '1',
            'article_id' => '11',
        ]);
        DB::table('promotion_articles')->insert([
            'promotion_id' => '1',
            'article_id' => '15',
        ]);

        DB::table('promotion_articles')->insert([
            'promotion_id' => '2',
            'article_id' => '3',
        ]);
        DB::table('promotion_articles')->insert([
            'promotion_id' => '2',
            'article_id' => '6',
        ]);
        DB::table('promotion_articles')->insert([
            'promotion_id' => '2',
            'article_id' => '9',
        ]);
        DB::table('promotion_articles')->insert([
            'promotion_id' => '2',
            'article_id' => '12',
        ]);
        DB::table('promotion_articles')->insert([
            'promotion_id' => '2',
            'article_id' => '13',
        ]);
    }
}
