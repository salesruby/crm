<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadProduct extends Model
{
    protected $table = 'lead_product';

    protected $fillable =  ['lead_id', 'product_id'];
}
