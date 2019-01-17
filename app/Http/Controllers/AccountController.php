<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Hash;
use App\Http\Requests\EditUser;


class AccountController extends Controller
{
	public function get_user($customer_nr)
	{
		// dd($customer_nr);
		// if ($customer_nr == NULL) {
		// 	$customer_nr = Auth::id();	
		// }
		$user = User::find($customer_nr);

    	return view('account.edit', compact('user'));
	}
    public function edit_user(EditUser $request, $customer_nr)
    {
    	$user = User::find($customer_nr);
    	// dd($user);
    	$user->first_name = $request->first_name;
    	$user->insertion = $request->insertion;
    	$user->last_name = $request->last_name;
    	$user->address = $request->address;
    	$user->zipcode = $request->zipcode;
    	$user->telephone_nr = $request->telephone_nr;
    	if ($request->email == $user->email) {
    		$user->email = $user->email;
    	} else {
    		$user->email = $request->email;
    	}
    	$user->email = $request->email;
    	$user->save();
    	return redirect()->back()->with('status', 'Gegevens geupdate');
    }
    public function password_update(Request $request, $customer_nr)
    {
    	$user = User::find($customer_nr);
    	if(Hash::check($request->password, $user->password)){
	    	$user->password = Hash::make($request->new_password);
    		$user->save();
    	} else {
    		dd($request);
    	}
    	return redirect()->back()->with('status', 'wachtwoord geupdate');
    	// dd($request->password);
    }
    public function delete_account(Request $request, $customer_nr )
    {
    	$user = User::find($customer_nr);

    	if ($request->isMethod('POST')) {
    		$user = User::find($customer_nr);
    		if (Auth::user()->can('delete-users')) {
    			$user->delete();
		    	return redirect()->route('admin_home')->with('status', 'Account verwijderd');
       		}
	    	if(Hash::check($request->password, $user->password)){
	    		$user->delete();
		    	return redirect()->route('home');
	    	}
	    	return redirect()->route('admin_home');
    	} else {
    		// $user = Auth::user();
    		return view('account.delete', compact('user'));
    	}
    }
}
