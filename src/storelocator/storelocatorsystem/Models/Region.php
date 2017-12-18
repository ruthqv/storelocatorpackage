<?php

namespace storelocator\storelocatorsystem\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $fillable = [
        'name',
        'country_id',
        'active'

    ];


    public function country() {
        return $this->belongsTo('storelocator\storelocatorsystem\Models\Country')->where('active',1);
    }

}
