<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Menu;

class HomepageController extends Controller
{
	public function index()
	{
		return view('homepage.index');
	}
	
	public function getUrl($attribute)
	{
		$request_items = ['menu', 'about', 'contact'];
		
		foreach($request_items as $request_item)
		{
			switch ($request_item) {
				case $request_item:
					return view('homepage.'.$request_item);
					break;
				case 'menu':
					// $menu = Menu::all();
					return view('homepage.menu', compact('menu'));
					break;
				default:
					return view('homepage.index');
					break;
			}
			// if(\Request::is('restaurant/'. $request_item))
			// {
			// 	if($request_item == 'homepage' || $request_item == '')
			// 	{
			// 		$request_item = 'index';
			// 	} elseif ($request_item == 'menu') {
			// 		$menu = Menu::all();
			// 		return view('homepage.menu', compact('menu'));
			// 	}
				
			// 	return view('homepage.'.$request_item);
			// }
		}
	}
}
