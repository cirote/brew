<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvasesTable extends Migration
{
    public function up()
    {
        Schema::create('envases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('bottled_at');
            $table->bigInteger('tipo')->unsigned()->referTo('id')->on('tipo_envases');
            $table->integer('cantidad');
            $table->integer('contenido_id');
            $table->string('contenido_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('envases');
    }
}
