<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom',25);
            $table->string('prenom',25);
            $table->string('email',40)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreignId('role_id')->constrained()->default(1);
        //      Les deux lignes commentées sont égales a la seule ligne du dessus.
        //    $table->unsignedBigInteger('role_id')->default(1);
        //    $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}