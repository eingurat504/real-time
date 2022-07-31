<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\RouteCoordinate;
use App\Models\LocationPoint;

class RouteController extends Controller
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
        $routes = Route::get();

        return view('routes.index',[
            'routes' => $routes
        ]);
    }

        /**
     * Show Route.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($routeId)
    {
        $route = Route::findorfail($routeId);

        return view('routes.show',[
            'route' => $route
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

        return view('routes.create',[
            'locations' => $locations
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
            'distance' => 'sometimes',
            'start_location' => 'sometimes',
            'end_location' => 'sometimes',
            'speed' => 'sometimes',
            'description' => 'sometimes',
        ]);

        $route = new Route();
        $route->name = $request->route_name;
        $route->short_code = $request->short_code;
        $route->distance = $request->distance;
        $route->origin_id = $request->start_location;
        $route->destination_id = $request->end_location;
        $route->speed = $request->speed;
        $route->description = $request->description;
        $route->created_at = date('Y-m-d H:i:s');
        $route->updated_at = date('Y-m-d H:i:s');
        $route->save();

        // flash("{$route->name} created.")->success();

        return redirect()->route('routes.index');
    }

    public function upload_coordinates(Request $request, $routeId)
    {
        $validator = Validator::make($request->all(), [
            'route_kml' => 'required|array',
            'route_kml.*.latitude' => 'required|lat',
            'route_kml.*.longitude' => 'required|lng',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $route = RouteCoordinate::find($routeId);

        if (!$route) {
            return response()->json(['error' => 'Unknown route coordinates'], 404);
        }

        $route->delete();


        DB::table('tblbmc_route_coordinates')
            ->where('route_id', $routeId)->delete();

        $count = 1;

        foreach ($request->route_kml as $coor) {

            $coord = new RouteCoordinate();
            $coord->sequence = $count;
            $coord->route_id = $coordinate[0];
            $coord->latitude = $coordinate[0];
            $coord->longitude = $coordinate[1];
            $coord->created_at = date('Y-m-d H:i:s');
            $coord->updated_at = date('Y-m-d H:i:s');

            $count++;
        }

        return response()->json(['status' => "{$route->name} uploaded."]);
    }


            /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function configureRoute(Request $request, $routeId)
    {
        $route = Route::findorfail($routeId);

        return view('routes.configure',[
            'route' => $route
        ]);
    }

}
