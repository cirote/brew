<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoteMaltaTable extends Migration
{
    public function up()
    {
        Schema::create('lote_malta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lote_id')->index()->foreign();
            $table->unsignedBigInteger('malta_id')->index()->foreign();
            $table->decimal('cantidad');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lote_malta');
    }
}
