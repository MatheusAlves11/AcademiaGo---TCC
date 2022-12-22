<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateAlunosEmagrecer extends Migration
{
    public function up()
    {
        Schema::create('alunos_emagrecer', function(Blueprint $table) {
            $table->foreignId('alunos_id');
            $table->foreignId('emagrecer_id');
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
        Schema::dropIfExists('sessions');
    }
}
