<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaceradosTable extends Migration
{
    public function up()
    {
        Schema::create('macerados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lote_id')->unsigned()->referTo('id')->on('lotes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('macerados');
    }
}
