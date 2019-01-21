<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $primaryKey = ['device', 'timestamp'];
    protected $fillable = ['device', 'timestamp', 'reservation_nr', 'table_nr', 'product_nr', 'total_ordered', 'time']; 
    public $incrementing = false;

    public function product()
    {
        return $this->hasOne('App\Product', 'product_nr', 'product_nr');
    }

    public function table()
    {
        return $this->hasOne('App\Table', 'table_nr', 'table_nr');
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation', 'reservation_nr', 'reservation_nr');
    }
}
