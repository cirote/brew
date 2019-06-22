<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaltasTable extends Migration
{
    public function up()
    {
        Schema::create('maltas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('malteria_id')->foreign()->references('id')->on('malterias');
            $table->string('nombre')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maltas');
    }
}
