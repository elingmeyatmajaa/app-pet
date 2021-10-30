<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    protected $fillable = ['orders_id', 'product_name', 'brand', 'quantity', 'budget', 'amount'];
}
