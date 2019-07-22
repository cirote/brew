<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecetasTable extends Migration
{
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->index();
            $table->string('alias')->nullable();
            $table->string('link')->nullable();
            $table->string('tamano');
            $table->string('gravedad_original');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recetas');
    }
}
