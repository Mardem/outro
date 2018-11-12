<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGerenciamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerenciamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('socio_id')->nullable();
            $table->string('data_ocorrencia')->nullable();
            $table->string('titulo')->nullable();
            $table->string('situacao')->nullable();
            $table->string('data_hora')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('gerenciamentos');
    }
}
