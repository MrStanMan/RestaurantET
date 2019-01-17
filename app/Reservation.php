<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';
    public $primaryKey = 'reservation_nr';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'customer_nr', 'customer_nr');
    }

    public function table()
    {
        return $this->hasMany('App\Table', 'table_nr', 'table_nr');
    }
}
