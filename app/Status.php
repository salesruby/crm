<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name', 'alias', 'description'];

    public function deals(){
        return $this->hasMany('App\Deal');
    }
}
