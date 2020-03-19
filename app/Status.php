<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name', 'description'];

//    public function leads(){
//        return $this->belongsTo(Lead::class, 'status_id');
//    }

    public function deals(){
        return $this->hasMany('App\Deal');
    }
}
