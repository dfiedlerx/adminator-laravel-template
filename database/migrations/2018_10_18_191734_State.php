<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class State extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('state');

        Schema::create('state', function (Blueprint $table) {
            $table->increments('id');
                $table->string      ('estado' , 250);
                $table->string      ('sigla' , 250);
            $table->timestamps();
        });

         DB::table('state')->insert([
            ['estado' => 'Acre', 'sigla' => 'AC'],
            ['estado' => 'Alagoas', 'sigla' => 'AL'],
            ['estado' => 'Amapá', 'sigla' => 'AP'],
            ['estado' => 'Amazonas', 'sigla' => 'AM'],
            ['estado' => 'Bahia', 'sigla' => 'BA'],
            ['estado' => 'Ceará', 'sigla' => 'CE'],
            ['estado' => 'Distrito Federal', 'sigla' => 'DF'],
            ['estado' => 'Espírito Santo', 'sigla' => 'ES'],
            ['estado' => 'Goiás', 'sigla' => 'GO'],
            ['estado' => 'Maranhão', 'sigla' => 'MA'],
            ['estado' => 'Mato Grosso', 'sigla' => 'MT'],
            ['estado' => 'Mato Grosso do Sul', 'sigla' => 'MS'],
            ['estado' => 'Minas Gerais', 'sigla' => 'MG'],
            ['estado' => 'Pará', 'sigla' => 'PA'],
            ['estado' => 'Paraíba', 'sigla' => 'PB'],
            ['estado' => 'Paraná', 'sigla' => 'PR'],
            ['estado' => 'Pernambuco', 'sigla' => 'PE'],
            ['estado' => 'Piauí', 'sigla' => 'PI'],
            ['estado' => 'Rio de Janeiro', 'sigla' => 'RJ'],
            ['estado' => 'Rio Grande do Norte', 'sigla' => 'RN'],
            ['estado' => 'Rio Grande do Sul', 'sigla' => 'RS'],
            ['estado' => 'Rondônia', 'sigla' => 'RO'],
            ['estado' => 'Roraima', 'sigla' => 'RR'],
            ['estado' => 'Santa Catarina', 'sigla' => 'SC'],
            ['estado' => 'São Paulo', 'sigla' => 'SP'],
            ['estado' => 'Sergipe', 'sigla' => 'SE'],
            ['estado' => 'Tocantins', 'sigla' => 'TO']
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state');
    }
}
