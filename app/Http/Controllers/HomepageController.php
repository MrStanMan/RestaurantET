<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class HomepageController extends Controller
{
	public function getUrl($attribute)
	{
		$request_items = ['homepage', 'menu', 'about', 'contact'];
		
		foreach($request_items as $request_item)
		{
			if(\Request::is('restaurant/'. $request_item))
			{
				if($request_item == 'homepage' || $request_item == '')
				{
					$request_item = 'index';
				}
				
				return view('homepage.'.$request_item);
			}
		}
	}
}
