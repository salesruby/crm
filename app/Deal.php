<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ["start_date", "close_date", "expectation", "product_id", "user_id", "lead_id",
        "status_id", 'total_expectation', 'quantity'];

    protected $table = 'deals';

    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,  'product_id');
    }

}
