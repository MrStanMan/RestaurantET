<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer::class, 10)->create()->each(function ($user) {
	        $user =	factory(App\Customer::class)->make();
	    });
    }
}