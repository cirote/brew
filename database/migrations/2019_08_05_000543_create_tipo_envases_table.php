<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoEnvasesTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_envases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('abreviatura');
            $table->string('nombre');
            $table->string('capacidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_envases');
    }
}
