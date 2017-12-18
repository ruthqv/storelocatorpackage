<?php

namespace storelocator\storelocatorsystem\Models;

use Illuminate\Database\Eloquent\Model;


class Zone extends Model
{

    protected $fillable = [
        'name',
        'active',
    ];



     public function countries() {
        return $this->hasMany('storelocator\storelocatorsystem\Models\Country');
    }
}
