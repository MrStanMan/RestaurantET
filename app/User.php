<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use Notifiable;

    public $primaryKey = 'customer_nr';
    public $incrementing = false;
    public $table = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_nr', 'password', 'last_name', 'insertion', 'first_name', 'address', 'zipcode', 'telephone_nr', 'town', 'email', 'email_verified_at', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeCheck($query, $customer_nr)
    {
        if ($customer_nr == Auth::id()) {
            return $query->where('customer_nr', $customer_nr)->get()->first();
        } else {
            return false;
        }
        // return $query->where('customer_nr', $customer_nr)->get()->first();
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail($this->customer_nr));
    }

    public function User()
    {
    	$user = factory(User::class)->create();
 	}

    public function reservation()
    {
        return $this->hasMany('App\Reservation', 'customer_nr', 'customer_nr');
    }
}
