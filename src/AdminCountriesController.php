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
        $countries = Country::all();

        return view('storelocator::admin.countries.index', compact('countries'));
    }

    public function create()
    {

        $zones = Zone::all();

        $countries = Country::all();

        $regions = Region::all();

        return view('storelocator::admin.countries.create', compact( 'zones', 'countries', 'regions'));
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

        $created = Country::create($array);

        if ($created) {
            // Remove Cache
            cache()->flush();

            return redirect(route('admin.countries.index'))->with('alert-success', 'The store has been add successfully.');
        } else {
            return back()->with('alert-danger', 'The store cannot be added, please try again or contact the administrator.');
        }

    }

    public function show($id)
    {
        $country = Country::find($id);

        $zones = Zone::all();

        $regions = Region::all();

        return view('storelocator::admin.countries.show', compact('country', 'zones', 'regions'));

    }

    public function update(Request $request, $id)
    {

        $country = Country::find($id);
        $array = $request->all();

        // Validation
        $this->validate($request, [
            'name' => 'required|min:2|max:45,' . $country['id'],

        ]);

        // Sanitize input array
        $array['active'] = isset($array['active']) && $array['active'] == 1;

        $country->update($array);

        return redirect(route('admin.countries.index'))->with('alert-success', 'The country has been updated successfully.');

    }

    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        return redirect(route('admin.countries.index'))->with('alert-success', 'The country has been removed successfully.');

    }

   

}
