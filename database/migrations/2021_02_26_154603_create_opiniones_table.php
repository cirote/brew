<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinionesTable extends Migration
{
    public function up()
    {
        Schema::create('opiniones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fermentado_id')->index()->foreing();
			$table->text('opinante')->nullable()->default(Null);
			$table->integer('puntaje')->unsigned()->nullable()->default(Null);
			$table->text('opinion')->nullable()->default(Null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opiniones');
    }
}
