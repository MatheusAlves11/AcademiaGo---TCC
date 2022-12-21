<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAlunosTable.
 */
class CreateAlunosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alunos', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('cep');
            $table->string('rua');
            $table->unsignedBigInteger('numeroCasa');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('complemento')->nullable();
            $table->unsignedBigInteger('telefone');
            $table->dateTime('dataNascimento');
            $table->string('genero');
            $table->string('filial');
            $table->float('peso');
            $table->float('altura');
            $table->unsignedBigInteger('frequencia');
            $table->string('remdioControlado')->nullable();
            $table->boolean('bebidaAlcolica');
            $table->boolean('taxasAltas');
            $table->boolean('fumante');
            $table->boolean('hipertenso');
            $table->boolean('diabes');
            $table->unsignedBigInteger('id_usuario');
            //Dados pra recomendação de treino
            $table->json('lesao'); //Serve pra inviabilizar musculo
            $table->string('alteracaoCardiaca'); //Serve pra escolher a meta de treino 
            $table->string('objetivo'); //Serve pra indicar a quantidade de exercicios e cardios de um treino
            $table->float('imc'); //IMC interage pra definir a intensidade 
            $table->string('intensidade'); //Intensidade serve pra definir as series e repetições de um treino
            $table->string('metaTreino'); //Serve pra escolher o treino com meta mais proximo
            $table->timestamps();
		});
		Schema::table('alunos', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alunos');
	}
}
