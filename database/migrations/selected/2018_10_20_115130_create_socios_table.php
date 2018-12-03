<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('tipo')->nullable();
            $table->string('nome');
            $table->string('cpf_cnpj');
            $table->string('rg');
            $table->string('email')->nullable();
            $table->string('operador_id')->nullable();
            $table->string('telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->integer('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();

            // Telefones do dump -> Não são usadas no sistema
            $table->string('fone1')->nullable();
            $table->string('fone2')->nullable();
            $table->string('fone3')->nullable();
            $table->string('fone4')->nullable();
            $table->string('fone5')->nullable();
            $table->string('fone6')->nullable();
            $table->string('fone7')->nullable();
            $table->string('fone8')->nullable();
            $table->string('fone9')->nullable();
            $table->string('fone10')->nullable();
            $table->string('type')->nullable();
            $table->boolean('situacao')->default(0);
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
        Schema::dropIfExists('socios');
    }
}
