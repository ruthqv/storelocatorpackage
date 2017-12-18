<?php

namespace storelocator\storelocatorsystem;

use Session;

use storelocator\storelocatorsystem\Models\Store;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Response;

class FrontStoresController extends Controller {



	public function index(){


      $stores=Store::all();

      return view('storelocator::front.index', compact('stores'));

    }


}
