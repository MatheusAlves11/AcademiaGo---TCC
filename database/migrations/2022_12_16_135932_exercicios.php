<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Exercicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Exercicios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('exercicio');
            $table->string('musculo');
            $table->string('intensidade'); 
            $table->unsignedBigInteger('serie');
            $table->unsignedBigInteger('repeticoes');
            $table->unsignedBigInteger('descanso');
            $table->string('tipoTempoDuracao');
            $table->unsignedBigInteger('meta')->nullable();
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
   		 Schema::drop('Exercicios');
    }
}
