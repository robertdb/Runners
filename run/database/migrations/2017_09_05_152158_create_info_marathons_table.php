<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoMarathonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_marathons', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->float('lat');
          $table->float('lng');
          $table->string('description');
          $table->string('img');
          $table->string('date');
          $table->string('hour');
          $table->string('distance');
          $table->string('address');
          $table->string('subscribe_link');
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
        Schema::dropIfExists('info_marathons');
    }
}
