<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Reservation;
use Hash;
use Validator;
use App\Rules\Capcha;

use App\Http\Requests\EditUser;
use App\Http\Requests\DeleteUser;


class AccountController extends Controller
{
	public function show_user($customer_nr)
	{
		$user = User::find($customer_nr);
        // dd(Auth::id());
		if ($customer_nr == Auth::id()){
			return view('pages.profile', compact('user'));
		} else {
			return redirect()->back()->with('error', 'Je kunt deze gebruiker niet bekijke!');
		}
	}
	public function get_user($customer_nr)
	{
		$user = User::find($customer_nr);
		if (Auth::user()->can('update-users') == true) {
			return view('account.edit', compact('user'));
		}
		elseif ($customer_nr == Auth::id()){
	    	return view('account.edit', compact('user'));
		} else {
			return redirect()->back()->with('error', 'Je kunt deze gebruiker niet bewerken!');
		}
	}
    public function edit_user(EditUser $request, $customer_nr)
    {
    	$user = User::find($customer_nr);
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
    	return redirect()->back()->with('success', 'Gegevens geüpdate');
    }
		public function block_user($customer_nr){
			$user = User::find($customer_nr);
			if ($user->status == '0') {
				$user->status = '1';
				$user->save();
				return redirect()->back()->with('success', 'Account geblokkeerd');
			} else {
				$user->status = '0';
				$user->save();
				return redirect()->back()->with('success', 'Account gedeblokkeerd');
			}
		}
    public function password_update(Request $request, $customer_nr)
    {
    	$user = User::find($customer_nr);

        $validator = Validator::make($request->all(), [
            'new_password' => ['required'],
            'password' => ['required', 'required_with:password_confirmation','same:password_confirmation'],
            'password_confirmation' => ['required'],
        ]);
            dd($validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
            
        } elseif ($validator->fails() == true) {
            dd($user);
            $user->save();
            return redirect()->back()->with('success', 'Wachtwoord gewijzigd');
        }
    	
    }
    public function delete_account(Request $request, $customer_nr )
    {
    	$user = User::find($customer_nr);
    	if ($request->isMethod('POST')) {
    		if (Auth::user()->can('delete-users')) {
    			$user->delete();
		    	return redirect()->route('admin_home')->with('success', 'Account verwijderd');
       		} else {
	    		$validator = Validator::make($request->all(), [
		            'g-recaptcha-response' => ['required', new Capcha],
		            'password' => ['required', 'required_with:password_confirmed','same:password_confirmed'],
		            'password_confirmed' => ['required'],
		        ]);
		        if ($validator->fails()) {
		            return redirect()->back()->withErrors($validator);
		        } elseif ($validator->fails() == true) {
		        	$user->delete();
		        	return redirect()->route('login')->with('success', 'account verwijderd');
		        }
		    }

    	} else {
    		return view('account.delete', compact('user'));
    	}
    }
}
