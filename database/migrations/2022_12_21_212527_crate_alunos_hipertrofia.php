<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateAlunosHipertrofia extends Migration
{
    public function up()
    {
        Schema::create('alunos_hipertrofia', function(Blueprint $table) {
            $table->foreignId('alunos_id');
            $table->foreignId('hipertrofia_id');
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
