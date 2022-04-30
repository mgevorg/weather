<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_datas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('time', 100);
            $table->double('latitude');
            $table->double('longitude');
            $table->double('temp');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->double('temp_min');
            $table->double('temp_max');
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
        Schema::dropIfExists('weather_datas');
    }
}

