<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable =['user_id', 'lead_id', 'product_id', 'summary', 'next_dated_step', 'action', 'status'];
}
