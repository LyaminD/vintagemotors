<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gamme_id');
            $table->string('nom',25);
            $table->string('description',60);
            $table->text('description_detaillee');
            $table->string('image',25);
            $table->float('prix');
            $table->integer('stock');
            $table->float('note')->nullable();
            $table->engine = 'InnoDB';
            $table->timestamps();

            $table->foreign('gamme_id')->references('id')->on('gammes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
