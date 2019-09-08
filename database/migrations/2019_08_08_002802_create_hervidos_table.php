<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHervidosTable extends Migration
{
    public function up()
    {
        Schema::create('hervidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('macerado_id')->unsigned()->referTo('id')->on('macerados');
            $table->string('duracion');
            $table->string('final')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hervidos');
    }
}
