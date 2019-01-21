<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Rules\Capcha;

use App\Mail\UserAuth;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'g-recaptcha-response' => ['required', new Capcha],
            'customer_nr' => ['required', 'max:5'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'last_name' => ['required', 'string', 'max:64'],
            'insertion' => ['string', 'nullable', 'max:64'],
            'first_name' => ['required', 'string', 'max:64'],
            'address' => ['required', 'string', 'max:64'],
            'zipcode' => ['required', 'string', 'max:32'],
            'town' => ['required', 'string', 'max:64'],
            'telephone_nr' => ['required', 'digits_between:8,16', 'max:16'],
            'email' => ['required', 'email', 'max:64', 'unique:customer,email'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'town' => $data['town'],
            'customer_nr' => $data['customer_nr'],
            'first_name' => $data['first_name'],
            'insertion' => $data['insertion'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'zipcode' => $data['zipcode'],
            'telephone_nr' => $data['telephone_nr'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->attachRole('user');
        return $user;
    }
}
