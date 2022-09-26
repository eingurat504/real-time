<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationPoint;
use App\Models\LocationType;

class LocationController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locations = LocationPoint::get();

        return view('locations.index',[
            'locations' => $locations
        ]);
    }

        /**
     * Show location.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($locationId)
    {
        $location = LocationPoint::findorfail($locationId);

        return view('locations.show',[
            'location' => $location
        ]);
    }

            /**
     * Show location.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $locationId)
    {
        $location = LocationPoint::findorfail($locationId);

        $types = LocationType::get();

        return view('locations.edit',[
            'location' => $location,
            'types' => $types
        ]);
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $types = LocationType::get();

        return view('locations.create',[
            'types' => $types
        ]);
    }

            /**
     * Store location.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'short_code' => 'sometimes',
            'location_type' => 'sometimes',
            'latitude' => 'sometimes',
            'longitude' => 'sometimes',
            'address' => 'sometimes',
        ]);

        $location = new LocationPoint();
        $location->name = $request->name;
        $location->short_code = $request->short_code;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->location_type_id = $request->location_type;
        $location->address = $request->address;
        $location->created_at = date('Y-m-d H:i:s');
        $location->updated_at = date('Y-m-d H:i:s');
        $location->save();

        // flash("{$route->name} created.")->success();

        return redirect()->route('locations.index');
    }


    
    /**
     * Update location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $locationId)
    {

        $this->validate($request, [
            'name' => 'required',
            'short_code' => 'sometimes',
            'location_type' => 'sometimes',
            'latitude' => 'sometimes',
            'longitude' => 'sometimes',
            'address' => 'sometimes',
        ]);

        $type = LocationPoint::where('id', $locationId)
        ->update([
            'name' => $request->name,
            'short_code' => $request->short_code,
            'location_type_id' => $request->location_type,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // flash("{$route->name} updated.")->success();

        return redirect()->route('locations.index');
    }

}
