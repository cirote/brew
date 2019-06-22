<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevadurasTable extends Migration
{
    public function up()
    {
        Schema::create('levaduras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->index();
            $table->unsignedBigInteger('laboratorio_id')->index()->foreing();
            $table->string('descripcion');
            $table->decimal('atenuacion_maxima');
            $table->decimal('atenuacion_minima');
            $table->decimal('floculacion_maxima');
            $table->decimal('floculacion_minima');
            $table->decimal('tolerancia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('levaduras');
    }
}
