<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoteLupuloTable extends Migration
{
    public function up()
    {
        Schema::create('lote_lupulo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lupulo_id')->index()->foreign();
            $table->unsignedBigInteger('lote_id')->index()->foreign();
            $table->decimal('aa')->unsigned()->nullable();
            $table->string('cantidad');
            $table->integer('momento');
        });
    }

   public function down()
    {
        Schema::dropIfExists('lote_lupulo');
    }
}
