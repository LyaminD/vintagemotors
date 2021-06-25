<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('commande_id');
            $table->integer('quantite');
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->primary(['commande_id', 'article_id']);
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('commande_id')->references('id')->on('commandes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_articles');
    }
}
