<?php
namespace storelocator\storelocatorsystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use storelocator\storelocatorsystem\Models\Country;
use storelocator\storelocatorsystem\Models\Region;
use storelocator\storelocatorsystem\Models\Store;
use storelocator\storelocatorsystem\Models\Zone;

class AdminStoresController extends Controller
{

    public function index()
    {
        $stores = Store::all();

        return view('storelocator::admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $stores = Store::all();

        $zones = Zone::all();

        $countries = Country::all();

        $regions = Region::all();

        return view('storelocator::admin.stores.create', compact('stores', 'zones', 'countries', 'regions'));
    }

    public function store(Request $request)
    {

        $array = $request->all();

        // Validation
        $this->validate($request, [
            'name' => 'required|min:2|max:45',
        ]);

        // Sanitize input array
        $array['active'] = isset($array['active']) && $array['active'] == 1;

        $created = Store::create($array);

        if ($created) {
            // Remove Cache
            cache()->flush();

            return redirect(route('admin.stores.index'))->with('alert-success', 'The store has been add successfully.');
        } else {
            return back()->with('alert-danger', 'The store cannot be added, please try again or contact the administrator.');
        }

    }

    public function show($id)
    {
        $store = Store::find($id);

        $zones = Zone::all();

        $countries = Country::all();

        $regions = Region::all();

        return view('storelocator::admin.stores.show', compact('store', 'zones', 'countries', 'regions'));

    }

    public function update(Request $request, $id)
    {

        $store = Store::find($id);

        $array = $request->all();

        // Validation
        $this->validate($request, [
            'name' => 'required|min:2|max:45,' . $store['id'],

        ]);

        // Sanitize input array
        $array['active'] = isset($array['active']) && $array['active'] == 1;

        $store->update($array);

        return redirect(route('admin.stores.index'))->with('alert-success', 'The store has been updated successfully.');

    }

    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();

        return redirect(route('admin.stores.index'))->with('alert-success', 'The stores has been removed successfully.');

    }

    public function generatedata()
    {

        $stores = Store::all();

        foreach ($stores as $row) {
            $store[] = array(
                "id"           => "" .$row['id']."",
                "name"         => $row['name'],
                "lat"          => $row['latitude'],
                "lng"          => $row['longitude'],
                "address"      => $row['address'],
                "city"         => $row['city'],
                "zone_id"      => "" . $row['zone_id'] ."",
                "country_id"   => "". $row['country_id'] . "",
                "region_id"    => "". $row['region_id'] ."",
                "region_name"  => Region::where('id', $row['region_id'])->value('name'),
                "country_name" => Country::where('id', $row['country_id'])->value('name'),
                "zone_name"    => Zone::where('id', $row['zone_id'])->value('name'),
                "phone"        => $row['phone'],
                "email"        => $row['email'],

            );
        }

        $data_to_file_json = json_encode($store, JSON_UNESCAPED_UNICODE);
        $fp                = fopen(resource_path('assets/stores/') . 'locations.json', 'w');

        fwrite($fp, json_encode($store));
        fclose($fp);

        return back()->with('alert-success', 'The stores map has beenupdated successfully.');

        if ($fp == false) {

            return back()->with('alert-error', 'The stores hasn´t been updated because a problem in the directory.');

        }
    }

}
