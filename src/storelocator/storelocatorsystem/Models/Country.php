<?php

namespace storelocator\storelocatorsystem\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
		
	protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'zone_id',
        'active',
        'iso'
    ];


    public function zone() {
        return $this->belongsTo('storelocator\storelocatorsystem\Models\Zone')->where('active',1);
    }

    public function regions()
    {
        return $this->hasMany('storelocator\storelocatorsystem\Region', 'country_id', 'id')->where('active',1);
    }


}
