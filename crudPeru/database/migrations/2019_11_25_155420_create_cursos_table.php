<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            /* $table->unsignedBigInteger('cliente_id'); */
            $table->string('titulo');
            /* $table->date('emitido');
            $table->date('vence');
            $table->date('codigo'); */
            

            $table->timestamps();

            /* $table->foreign('cliente_id')->references('id')->on('clientes'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
