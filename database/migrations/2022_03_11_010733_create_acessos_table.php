<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acessos', function (Blueprint $table) {
            $table->string('codpes');
            $table->string('predio')->default('Prédio Principal'); # TODO Criar uma model para cadastrar os prédios
            $table->string('nome');
            $table->string('vacina')->default('Não cadastrado'); # TODO Será que é o melhor lugar para registar os que não cadastraram a informação sobre covid19?
            $table->id();
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
        Schema::dropIfExists('acessos');
    }
}
