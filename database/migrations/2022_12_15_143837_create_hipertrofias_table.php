<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateHipertrosfiaTable.
 */
class CreateHipertrofiasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hipertrofias', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nome');
             $table->unsignedBigInteger('id_aluno');
             $table->json('exercicio');
             $table->json('cardio');
			 $table->string('area');
             $table->json('carga')->nullable();
			 $table->timestamps();
		});
		Schema::table('hipertrofias', function (Blueprint $table) {
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
