<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $primaryKey = 'product_nr';
    public $incrementing = false;

    public function order()
    {
        return $this->belongsTo('App\Order', 'product_nr', 'product_nr');
    }
}
