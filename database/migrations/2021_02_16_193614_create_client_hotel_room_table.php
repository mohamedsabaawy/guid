<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientHotelRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_hotel_room', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('client_id');
            $table->integer('hotel_room_id');
            $table->date('start_at');
            $table->date('end_at');
            $table->double('price');
            $table->enum('status',[0,1,2])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_hotel_rooms');
    }
}
