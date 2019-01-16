<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $primaryKey = ['device', 'timestamp'];
    public $incrementing = false;
}
