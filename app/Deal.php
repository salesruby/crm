<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ["start_date", "close_date", "expectation", "product_id", "user_id", "lead_id", "status_id"];

    protected $table = 'deals';
}
