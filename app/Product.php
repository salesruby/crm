<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description'];

    public function deals(){
        return $this->hasMany(Deal::class, 'product_id')
            ->latest()
            ->limit(1);
    }

    public function chats(){
        return $this->hasMany(Chat::class, 'product_id');
    }

}
