<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Model
{
    use Notifiable;

    protected $primaryKey = 'customer_nr';
    public $table = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_nr', 'password', 'last_name', 'insertion', 'first_name', 'address', 'zipcode', 'telephone_nr', 'email', 'email_verified_at', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Customer()
    {
    	$user = factory(Customer::class)->create();
    }
}
