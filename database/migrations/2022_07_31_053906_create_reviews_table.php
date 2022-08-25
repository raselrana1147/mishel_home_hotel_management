<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('user_id');
           $table->unsignedBigInteger('room_id');
           $table->integer('ratting');
           $table->text('comment');
           $table->tinyInteger('status')->default(0)->comment('0=unpublish,1=publish');
           $table->timestamps();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
