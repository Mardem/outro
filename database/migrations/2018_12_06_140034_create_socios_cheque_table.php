<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSociosChequeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios_cheque', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('origem')->nullable();
            $table->string('emitente')->nullable();
            $table->string('cpf_cnpj')->nullable();
            $table->integer('banco')->nullable();
            $table->string('numero_cheque')->nullable();
            $table->integer('quantidade_cheque')->nullable();
            $table->string('valor_unitario')->nullable();
            $table->string('valor_total')->nullable();
            $table->datetime('vencimento')->nullable();
            $table->string('titulo')->nullable();
            $table->string('titular')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('cep')->nullable();
            $table->string('email')->nullable();
            $table->longText('telefone')->nullable();
            $table->longText('observacao')->nullable();
            $table->integer('situacao')->default(0);

            // $table->string('tipo')->nullable();
            // $table->string('nome');
            // $table->string('rg')->nullable();

            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // $table->integer('numero')->nullable();
            // $table->string('complemento')->nullable();
            // $table->date('designado')->nullable();
            // $table->string('valor')->nullable();

            // // Telefones do dump -> Não são usadas no sistema
            // $table->string('fone1')->nullable();
            // $table->string('fone2')->nullable();
            // $table->string('fone3')->nullable();
            // $table->string('fone4')->nullable();
            // $table->string('fone5')->nullable();
            // $table->string('fone6')->nullable();
            // $table->string('fone7')->nullable();
            // $table->string('fone8')->nullable();
            // $table->string('fone9')->nullable();
            // $table->string('fone10')->nullable();
            // $table->string('fone11')->nullable();
            // $table->string('fone12')->nullable();
            // $table->string('fone13')->nullable();
            // $table->string('fone14')->nullable();
            // $table->string('data_nascimento')->nullable();
            // $table->string('type')->nullable();


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
        Schema::dropIfExists('socios_cheque');
    }
}
