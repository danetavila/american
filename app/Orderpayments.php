<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderpayments extends Model
{
    protected $table = 'orderpayments';
    protected $fillable = ['order_id','payments_id', 'value'];
}
