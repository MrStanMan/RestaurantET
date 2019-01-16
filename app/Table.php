<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';
    public $primaryKey = 'table_nr';
    public $incrementing = false;
}
