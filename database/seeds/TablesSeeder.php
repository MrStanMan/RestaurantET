<?php

use Illuminate\Database\Seeder;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
        	[
        		'table_nr' => '1',
	        	'status' => True,
	        	'total_chairs' => '2'
	        ], [
	        	'table_nr' => '2',
	        	'status' => True,
	        	'total_chairs' => '2'
	        ], [
	        	'table_nr' => '3',
	        	'status' => True,
	        	'total_chairs' => '2'
	        ], [
	        	'table_nr' => '4',
	        	'status' => True,
	        	'total_chairs' => '3'
	        ], [
	        	'table_nr' => '5',
	        	'status' => True,
	        	'total_chairs' => '3'
	        ], [
	        	'table_nr' => '6',
	        	'status' => True,
	        	'total_chairs' => '3'
	        ], [
	        	'table_nr' => '7',
	        	'status' => True,
	        	'total_chairs' => '4'
	        ], [
	        	'table_nr' => '8',
	        	'status' => True,
	        	'total_chairs' => '4'
	        ], [
	        	'table_nr' => '9',
	        	'status' => True,
	        	'total_chairs' => '4'
	        ], [
	        	'table_nr' => '10',
	        	'status' => True,
	        	'total_chairs' => '5'
	        ]
        ]);
    }
}
