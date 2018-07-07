<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
   
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('date_and_time');
            $table->string('message');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
