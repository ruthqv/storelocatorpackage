<?php

namespace storelocator\storelocatorsystem\Models;

use App\Models\BaseModelLang;


class Store extends BaseModelLang
{

     
    protected $fillable = [
        'name', 'description','phone','latitude','longitude','zone_id','country_id', 'region_id', 'email', 'address','city' 
    ];



    public function country() {
        return $this->belongsTo('logistic\logisticsystem\Models\Country');
    }

    public function region() {
        return $this->belongsTo('logistic\logisticsystem\Models\Region');
    }

}
