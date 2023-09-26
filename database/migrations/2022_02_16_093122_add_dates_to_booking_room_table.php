<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatesToBookingRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_room', function (Blueprint $table) {
            $table->dateTime('date_in')->useCurrent();
            $table->dateTime('date_out')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_room', function (Blueprint $table) {
            $table->dropColumn(['date_in', 'date_out']);
        });
    }
}
