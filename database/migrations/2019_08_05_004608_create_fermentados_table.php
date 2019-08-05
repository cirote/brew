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
            $table->integer('fermentable_id');
            $table->string('fermentable_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fermentados');
    }
}
