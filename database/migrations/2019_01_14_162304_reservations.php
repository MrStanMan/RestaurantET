<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->string('reservation_nr', 64);
            $table->string('customer_nr', 64);
            $table->primary('reservation_nr');
            $table->string('table_nr', 16);
            $table->foreign('customer_nr')->references('customer_nr')->on('customer');
            $table->time('time_in');
            $table->time('time_out');
            $table->string('total_guests', 64);
            $table->string('extra_info', 255);
            $table->date('date');
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
        Schema::dropIfExists('reservation');
    }
}
