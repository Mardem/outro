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

            $table->integer('socio_id')->unsigned();
            $table->foreign('socio_id')
                ->references('id')
                ->on('socios');
            $table->integer('operador_id')->nullable();
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
