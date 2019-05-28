<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('email_verified_at')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->String('rg');
            $table->String('cpf');
            $table->String('telefone');
            $table->String('celular');
            $table->date('dt_nascimento');
            $table->enum('sexo', ['Masc'], ['Fem']);
            $table->String('pai');
            $table->String('mae');



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
