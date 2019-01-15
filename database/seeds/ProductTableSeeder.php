<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	[
        		'product_nr' => 0001,
	        	'product_description' => 'Soep van de dag',
	        	'category' => 'Voorgerechten',
	        	'price' => 4.00
	        ], [
	        	'product_nr' => 0002,
	        	'product_description' => 'Gerookte zalm op een bedje van basilicum',
	        	'category' => 'Voorgerechten',
	        	'price' => 8.50
	        ], [
	        	'product_nr' => 0003,
	        	'product_description' => 'Licht gezouten carpaccio met schijfjes buffelmozzarella',
	        	'category' => 'Voorgerechten',
	        	'price' => 9.00
	        ], [
	        	'product_nr' => 0004,
	        	'product_description' => 'Buffelmozzarella met tomaat en basilicumpesto',
	        	'category' => 'Voorgerechten',
	        	'price' => 7.00
	        ], [
	        	'product_nr' => 0011,
	        	'product_description' => 'Wienerschnitzel met saus naar keuze',
	        	'category' => 'Hoofdgerechten',
	        	'price' => 16.00
	        ], [
	        	'product_nr' => 0012,
	        	'product_description' => 'Kaasschnitzel van oude kaas met verse peterselieknoflookpesto',
	        	'category' => 'Hoofdgerechten',
	        	'price' => 12.00
	        ], [
	        	'product_nr' => 0013,
	        	'product_description' => 'Gerookte kipfilet met whiskysaus',
	        	'category' => 'Hoofdgerechten',
	        	'price' => 16.00
	        ], [
	        	'product_nr' => 0014,
	        	'product_description' => 'Tournedos met kruidenboter',
	        	'category' => 'Hoofdgerechten',
	        	'price' => 23.00
	        ], [
	        	'product_nr' => 0021,
	        	'product_description' => 'Macaroni met ham en kaas',
	        	'category' => 'Overige hoofdgerechten',
	        	'price' => 8.00
	        ], [
	        	'product_nr' => 0022,
	        	'product_description' => 'Pizza Margarita',
	        	'category' => 'Overige hoofdgerechten',
	        	'price' => 6.00
	        ], [
	        	'product_nr' => 0023,
	        	'product_description' => 'Pizza flex (met 2 toppings naar keuze: kaas, spek, ham, tomaat, ui, mozzarella)',
	        	'category' => 'Overige hoofdgerechten',
	        	'price' => 10.00
	        ]
        ]);
    }
}
