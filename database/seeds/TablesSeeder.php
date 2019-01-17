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
        		'table_nr' => '01',
	        	'status' => True,
	        	'total_chairs' => '2'
	        ], [
	        	'table_nr' => '02',
	        	'status' => True,
	        	'total_chairs' => '2'
	        ], [
	        	'table_nr' => '03',
	        	'status' => True,
	        	'total_chairs' => '2'
	        ], [
	        	'table_nr' => '04',
	        	'status' => True,
	        	'total_chairs' => '3'
	        ], [
	        	'table_nr' => '05',
	        	'status' => True,
	        	'total_chairs' => '3'
	        ], [
	        	'table_nr' => '06',
	        	'status' => True,
	        	'total_chairs' => '3'
	        ], [
	        	'table_nr' => '07',
	        	'status' => True,
	        	'total_chairs' => '4'
	        ], [
	        	'table_nr' => '08',
	        	'status' => True,
	        	'total_chairs' => '4'
	        ], [
	        	'table_nr' => '09',
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
