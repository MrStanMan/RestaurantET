<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getUrl($attribute)
	{
		$request_items = ['reservate', 'reservations', 'notes'];
		
		foreach($request_items as $request_item)
		{
			if(\Request::is('profile/'. $request_item))
			{
				return view('profilepage.'.$request_item);
			}
		}
	}
}
