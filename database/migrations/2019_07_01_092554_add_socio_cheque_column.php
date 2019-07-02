<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Gerenciamento;

class AddSocioChequeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gerenciamentos', function (Blueprint $table) {
            $table->integer('socio_id')->unsigned()->nullable()->change();
            $table->integer('socio_cheque_id')->unsigned()->nullable();
            $table->foreign('socio_cheque_id')
                ->references('id')
                ->on('socios_cheque');
            $table->integer('tipo_socio')->default(Gerenciamento::TIPO_SOCIO['SOCIO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gerenciamentos', function (Blueprint $table) {
            //
        });
    }
}
