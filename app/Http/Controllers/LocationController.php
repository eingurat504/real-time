<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationPoint;

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
     * Show Route.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($locationId)
    {
        $location = LocationPoint::findorfail($routeId);

        return view('locations.show',[
            'location' => $location
        ]);
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $locations = LocationPoint::get();

        return view('locations.create',[
            // 'locations' => $locations
        ]);
    }

            /**
     * Store Route.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'route_name' => 'required',
            'short_code' => 'sometimes',
            'location_type_id' => 'sometimes|exists:location_types:id',
            'start_location' => 'sometimes',
            'address' => 'sometimes',
        ]);

        $route = new LocationPoint();
        $route->name = $request->name;
        $route->short_code = $request->short_code;
        $route->location_type_id = $request->location_type;
        $route->address = $request->address;
        $route->created_at = date('Y-m-d H:i:s');
        $route->updated_at = date('Y-m-d H:i:s');
        $route->save();

        // flash("{$route->name} created.")->success();

        return redirect()->route('locations.index');
    }
}
