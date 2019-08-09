<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaceradoMaltaTable extends Migration
{
    public function up()
    {
        Schema::create('macerado_malta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('macerado_id')->index()->foreign()->referTo()->on('macerados');
            $table->unsignedBigInteger('malta_id')->index()->foreign()->referTo()->on('maltas');
            $table->string('cantidad');
        });
    }

    public function down()
    {
        Schema::dropIfExists('macerado_malta');
    }
}
