<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePersonalsTable.
 */
class CreatePersonalsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personals', function(Blueprint $table) {
            $table->increments('id');
            $table->string('cref');
            $table->string('filial')->nullable();
            $table->string('telefone');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();
		});
		Schema::table('personals', function (Blueprint $table) {
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
		Schema::drop('personals');
	}
}
