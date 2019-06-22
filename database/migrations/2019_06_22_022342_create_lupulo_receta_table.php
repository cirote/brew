<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLupuloRecetaTable extends Migration
{
    public function up()
    {
        Schema::create('lupulo_receta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lupulo_id')->index()->foreign();
            $table->unsignedBigInteger('receta_id')->index()->foreign();
            $table->decimal('cantidad');
            $table->integer('momento');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lupulo_receta');
    }
}
