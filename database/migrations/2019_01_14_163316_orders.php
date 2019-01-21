<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('device', 64);
            $table->timestamp('timestamp');
            $table->string('reservation_nr', 64);
            $table->string('table_nr', 64);
            $table->string('product_nr', 64);
            $table->string('total_ordered', 64);
            $table->time('time');
            $table->foreign('reservation_nr')->references('reservation_nr')->on('reservation');
            $table->foreign('table_nr')->references('table_nr')->on('tables');
            $table->foreign('product_nr')->references('product_nr')->on('products');
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
        Schema::dropIfExists('orders');
    }
}
