<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFermentadosTable extends Migration
{
    public function up()
    {
        Schema::create('fermentados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fermentable_id')->unsigned();
            $table->string('fermentable_type');
            $table->integer('fermentador_id')->unsigned()->nullable();
            $table->integer('levadura_id')->unsigned()->nullable();
			$table->string('levadura_estado')->nullable();
			$table->date('iniciado_at')->nullable();
            $table->date('finalizado_at')->nullable();
			$table->string('volumen_inicial')->nullable();
			$table->string('volumen_final')->nullable();
			$table->string('densidad_inicial')->nullable();
			$table->string('densidad_final')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fermentados');
    }
}
