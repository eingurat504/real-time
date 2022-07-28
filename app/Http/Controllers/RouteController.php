<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $routes = Route::get();

        return view('routes.create',[
            // 'routes' => $routes
        ]);
    }

            /**
     * Store Route.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        // dd('tdhuwfuhuwgdw');

        $this->validate($request, [
            'route_name' => 'required',
            'short_code' => 'sometimes',
            'distance' => 'sometimes',
            'start_location' => 'sometimes',
            'end_location' => 'sometimes',
            'speed' => 'sometimes',
        ]);
// dd($request->all());
        $route = new Route();
        $route->name = $request->route_name;
        $route->short_code = $request->short_code;
        $route->distance = $request->distance;
        $route->origin_id = $request->start_location;
        $route->destination_id = $request->end_location;
        $route->speed = $request->speed;
        $route->created_at = date('Y-m-d H:i:s');
        $route->updated_at = date('Y-m-d H:i:s');
        $route->save();

        // flash("{$route->name} created.")->success();

        return redirect()->route('routes.index');
    }
}
