<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLupuloLupuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lupulo_lupulo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lupulo_id')->unsigned()->index()->references('id')->on('lupulos');
            $table->bigInteger('sustituto_id')->unsigned()->index()->references('id')->on('lupulos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lupulo_lupulo');
    }
}
