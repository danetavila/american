<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailsorder extends Model
{
    protected $table = 'detailsorder';
    protected $fillable = ['product_id','order_id', 'product_price'];
}
