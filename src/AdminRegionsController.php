<?php
namespace storelocator\storelocatorsystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use storelocator\storelocatorsystem\Models\Region;
use storelocator\storelocatorsystem\Models\Country;
use storelocator\storelocatorsystem\Models\Store;
use storelocator\storelocatorsystem\Models\Zone;

class AdminRegionsController extends Controller
{

    public function index()
    {
        $regions = Region::all();

        return view('storelocator::admin.regions.index', compact('regions'));
    }

    public function create()
    {

        $zones = Zone::all();

        $countries = Country::all();

        $regions = Region::all();

        return view('storelocator::admin.regions.create', compact( 'zones', 'countries', 'regions'));
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

        $created = Region::create($array);

        if ($created) {
            // Remove Cache
            cache()->flush();

            return redirect(route('admin.regions.index'))->with('alert-success', 'The store has been add successfully.');
        } else {
            return back()->with('alert-danger', 'The store cannot be added, please try again or contact the administrator.');
        }

    }

    public function show($id)
    {
        $region = Region::find($id);

        $zones = Zone::all();

        $countries = Country::all();

        return view('storelocator::admin.regions.show', compact('region', 'zones', 'countries'));

    }

    public function update(Request $request, $id)
    {

        $region = Region::find($id);
        $array = $request->all();

        // Validation
        $this->validate($request, [
            'name' => 'required|min:2|max:45,' . $region['id'],

        ]);

        // Sanitize input array
        $array['active'] = isset($array['active']) && $array['active'] == 1;

        $region->update($array);

        return redirect(route('admin.regions.index'))->with('alert-success', 'The region has been updated successfully.');

    }

    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();

        return redirect(route('admin.regions.index'))->with('alert-success', 'The region has been removed successfully.');

    }

   

}
