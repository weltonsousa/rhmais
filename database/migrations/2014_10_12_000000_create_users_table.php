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
            $table->integer('perfil_users_id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('email_verified_at')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('rg');
            $table->string('cpf');
            $table->string('telefone');
            $table->string('celular');
            $table->date('dt_nascimento');
            $table->enum('sexo', ['Masc'], ['Fem']);
            $table->string('pai');
            $table->string('mae');
            $table->timestamps();


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
