<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHervidoLupuloTable extends Migration
{
    public function up()
    {
        Schema::create('hervido_lupulo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lupulo_id')->index()->refers('id')->on('lupulos');
            $table->unsignedBigInteger('hervido_id')->index()->refers('id')->on('hervidos');
            $table->decimal('aa')->unsigned()->nullable();
            $table->string('cantidad');
            $table->string('momento');
        });
    }

   public function down()
    {
        Schema::dropIfExists('hervido_lupulo');
    }
}
