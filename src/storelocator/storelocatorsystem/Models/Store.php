<?php

namespace storelocator\storelocatorsystem\Models;

use Illuminate\Database\Eloquent\Model;


class Store extends Model
{

     
    protected $fillable = [
        'name', 'description','phone','latitude','longitude','zone_id','country_id', 'region_id', 'email', 'address','city' 
    ];



    public function country() {
        return $this->belongsTo('storelocator\storelocatorsystem\Models\Country');
    }

    public function region() {
        return $this->belongsTo('storelocator\storelocatorsystem\Models\Region');
    }
    public function zone() {
        return $this->belongsTo('storelocator\storelocatorsystem\Models\Zone');
    }
}
