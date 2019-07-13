<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaltaRecetaTable extends Migration
{
    public function up()
    {
        Schema::create('malta_receta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('malta_id')->index()->foreign();
            $table->unsignedBigInteger('receta_id')->index()->foreign();
            $table->string('cantidad');
        });
    }

    public function down()
    {
        Schema::dropIfExists('malta_receta');
    }
}
