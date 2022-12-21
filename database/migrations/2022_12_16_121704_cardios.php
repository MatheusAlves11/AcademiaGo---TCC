<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cardios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cardios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('exercicio');
            $table->unsignedBigInteger('duracao');
            $table->string('tipoTempoDuracao');
            $table->string('intensidade'); 
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
   		 Schema::drop('Cardios');
    }
}
