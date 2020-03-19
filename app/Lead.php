<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company_name',
        'designation', 'next_dated_step'];

    public function deals(){
        return $this->hasMany('App\Deal');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'lead_product', 'lead_id', 'product_id')->withTimestamps();
    }

}
