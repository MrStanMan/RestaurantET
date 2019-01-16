<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\EditUser;


class AccountController extends Controller
{
	public function get_user()
	{
		$customer_nr = Auth::user()->customer_nr;

    	return view('account.edit', compact('customer_nr'));
	}
    public function edit_user(EditUser $request, $customer_nr)
    {
    	$user = User::find($customer_nr);
    	dd($user);
    }
}
