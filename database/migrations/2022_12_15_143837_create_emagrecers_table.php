<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEmagrecersTable.
 */
class CreateEmagrecersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('emagrecers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nome');
             $table->unsignedBigInteger('id_aluno');
             $table->json('exercicio');
             $table->string('area');
             $table->json('cardio');
             $table->json('carga')->nullable();
			 $table->timestamps();
		});
		Schema::table('emagrecers', function (Blueprint $table) {
             $table->foreign('id_aluno')->references('id')->on('users')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registencias');
	}
}
