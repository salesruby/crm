<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company_name',
        'lead_designation', 'product', 'phone', 'sales_rep_id', 'status'];

}
