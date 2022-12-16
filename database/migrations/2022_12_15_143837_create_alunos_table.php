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
            
			$table->unsignedBigInteger('id_usuario');
            $table->timestamps();
		});
		Schema::table('alunos', function (Blueprint $table) {
            //Aqui vamo s adicionar a chave extrangeira
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
