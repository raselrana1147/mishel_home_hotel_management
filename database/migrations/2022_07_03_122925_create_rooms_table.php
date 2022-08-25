<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_type_id');
            $table->unsignedBigInteger('floor_id');
            $table->unsignedBigInteger('room_keeper_id')->nullable();
            $table->string('title');
            $table->string('room_number')->unique();
            $table->integer('max_capacity');
            $table->integer('num_of_bed');
            $table->string('image');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->tinyInteger('status')->default(0)->comment('0=available,1=unavailable');
            $table->timestamps();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('cascade');
            $table->foreign('room_keeper_id')->references('id')->on('room_keepers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
