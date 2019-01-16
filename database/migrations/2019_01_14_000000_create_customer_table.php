<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->string('customer_nr', 64);
            $table->primary('customer_nr');
            $table->string('password', 64);
            $table->string('last_name', 64);
            $table->string('insertion', 64)->nullable();
            $table->string('first_name', 64);
            $table->string('address', 64);
            $table->string('zipcode', 32);
            $table->string('town', 64);
            $table->string('telephone_nr', 16);
            $table->string('email', 64)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('customer');
    }
}
