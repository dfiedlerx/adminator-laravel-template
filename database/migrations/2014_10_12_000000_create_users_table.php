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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // // $table->string('TelefonePrincipal' , 15);
            // $table->string('TelefoneSecundario' , 15);
            // $table->string('Rua' , 250);
            // $table->integer('Numero');
            // $table->string('Bairro' , 50);
            // $table->unsignedInteger  ('Cidade');
            // $table->foreign('Cidade')->references('id')->on('City')->onDelete('cascade');
            // $table->unsignedInteger  ('UserPicId');
            // $table->foreign('UserPicId')->references('id')->on('UserPic')->onDelete('cascade');
            // $table->boolean  ('Ativo')->default(false)->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::drop('users');
    }
}
