<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToDailyReservationRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_reservation_records', function (Blueprint $table) {
            $table->foreign('reservation_id')
            ->references('id')
            ->on('reservations')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_reservation_records', function (Blueprint $table) {
            $table->dropForeign('reservation_id');
        });
    }
}
