<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
    	'customer_nr' => $faker->numberBetween(00001, 99999),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    	'last_name' => $faker->lastName,
    	'insertion' => '',
    	'first_name' => $faker->firstName('male'|'female'),
    	'address' => $faker->streetAddress,
    	'zipcode' => $faker->postcode,
    	'town' => $faker->city,
    	'telephone_nr' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'remember_token' => str_random(10),
        'email_verified_at' => now(),
    ];
});
