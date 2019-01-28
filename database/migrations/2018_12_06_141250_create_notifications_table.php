<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->integer('gerenciamento_id')->unsigned();
            $table->foreign('gerenciamento_id')
                ->references('id')
                ->on('gerenciamentos');
            $table->integer('socio_id')->unsigned();
            $table->foreign('socio_id')
                ->references('id')
                ->on('socios');
            $table->dateTime('day_contact')->nullable();

            $table->string('status')->default(0);
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
        Schema::dropIfExists('notifications');
    }
}