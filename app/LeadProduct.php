<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaedProduct extends Model
{
    protected $table = 'lead_product';

    protected $fillable =  ['lead_id', 'product_id'];
}
