<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->integer('table_count');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->text('selected_seats'); // Gunakan tipe yang sesuai, bisa juga JSON
            $table->bigInteger('total_price'); // Gunakan tipe yang sesuai, bisa juga JSON
            $table->enum('status', ['Pending', 'Success', 'Failed' ]); // Gunakan tipe yang sesuai, bisa juga JSON
            $table->timestamps();

            // Definisikan foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('restaurant_id')->references('id')->on('restos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
