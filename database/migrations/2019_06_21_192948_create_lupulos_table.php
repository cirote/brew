<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLupulosTable extends Migration
{
    public function up()
    {
        Schema::create('lupulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variedad');
            $table->integer('aa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lupulos');
    }
}
