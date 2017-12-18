<?php
namespace storelocator\storelocatorsystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use storelocator\storelocatorsystem\Models\Country;
use storelocator\storelocatorsystem\Models\Region;
use storelocator\storelocatorsystem\Models\Store;
use storelocator\storelocatorsystem\Models\Zone;

class AdminCountriesController extends Controller
{

    public function index()
    {
        $countries = Store::all();

        return view('storelocator::admin.countries.index', compact('countries'));
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

        $created = $this->repoStore->create($array, $this->morphtables_type);

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
        $store = $this->repoStore->find($id);

        $zones = Zone::all();

        $countries = Country::all();

        $regions = Region::all();

        return view('storelocator::admin.stores.show', compact('store', 'zones', 'countries', 'regions'));

    }

    public function update(Request $request, $id)
    {

        $store = $this->repoStore->find($id);

        $fields = $this->repoStore->fields('stores');

        $array = $request->all();

        // Validation
        $this->validate($request, [
            'name' => 'required|min:2|max:45,' . $store['id'],

        ]);

        // Sanitize input array
        $array['active'] = isset($array['active']) && $array['active'] == 1;

        $store = $this->repoStore->update($array, $id, $fields, $this->morphtables_type);

        return redirect(route('admin.stores.index'))->with('alert-success', 'The store has been updated successfully.');

    }

    public function destroy($id)
    {
        $store = $this->repoStore->delete($id, $this->morphtables_type);

        return redirect(route('admin.stores.index'))->with('alert-success', 'The stores has been removed successfully.');

    }

    public function generatedata()
    {

        $stores = $this->repoStore->all();

        foreach ($stores as $row) {
            $store[] = array(
                "id"               => $row['id'],
                "name"             => $row['name'],
                "lat"              => $row['latitude'],
                "lng"              => $row['longitude'],
                "address"          => $row['address'],
                "city"             => $row['city'],
                "pais"             => $row['country_id'],
                "provincia"        => Region::where('id', $row['region_id'])->pluck('name'),
                "nombrepais"       => Country::where('id', $row['country_id'])->pluck('name'),
                "nombrecontinente" => Zone::where('id', $row['zone_id'])->pluck('name'),
                "continente"       => $row['zone_id'],
                "phone"            => $row['phone'],
                "email"            => $row['email'],

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
