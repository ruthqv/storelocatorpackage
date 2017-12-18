<?php
namespace storelocator\storelocatorsystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use storelocator\storelocatorsystem\Models\Country;
use storelocator\storelocatorsystem\Models\Zone;
use storelocator\storelocatorsystem\Models\Store;
use storelocator\storelocatorsystem\Models\Region;

class AdminZonesController extends Controller
{

    public function index()
    {
        $zones = Zone::all();

        return view('storelocator::admin.zones.index', compact('zones'));
    }

    public function create()
    {

        $zones = Zone::all();

        $countries = Country::all();

        $regions = Region::all();

        return view('storelocator::admin.zones.create', compact( 'zones', 'countries', 'regions'));
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

        $created = Zone::create($array);

        if ($created) {
            // Remove Cache
            cache()->flush();

            return redirect(route('admin.zones.index'))->with('alert-success', 'The store has been add successfully.');
        } else {
            return back()->with('alert-danger', 'The store cannot be added, please try again or contact the administrator.');
        }

    }

    public function show($id)
    {
        $zone = Zone::find($id);

        $regions = Region::all();

        $countries = Country::all();

        return view('storelocator::admin.zones.show', compact('zone', 'regions', 'countries'));

    }

    public function update(Request $request, $id)
    {

        $zone = Zone::find($id);
        $array = $request->all();

        // Validation
        $this->validate($request, [
            'name' => 'required|min:2|max:45,' . $zone['id'],

        ]);

        // Sanitize input array
        $array['active'] = isset($array['active']) && $array['active'] == 1;

        $zone->update($array);

        return redirect(route('admin.zones.index'))->with('alert-success', 'The zone has been updated successfully.');

    }

    public function destroy($id)
    {
        $zone = Zone::find($id);
        $zone->delete();

        return redirect(route('admin.zones.index'))->with('alert-success', 'The zone has been removed successfully.');

    }

   

}
