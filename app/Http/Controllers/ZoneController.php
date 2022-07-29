<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;

class ZoneController extends Controller
{
    //
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
        $zones = Zone::get();

        return view('zones.index',[
            'zones' => $zones
        ]);
    }

         /**
     * Show location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($typeId)
    {
        $zone = Zone::findorfail($zoneId);

        return view('zones.show',[
            'zone' => $zone
        ]);
    }

            /**
     * Show Edit location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $typeId)
    {
        $zone = Zone::findorfail($zoneId);

        return view('zones.edit',[
            'zone' => $zone
        ]);
    }

        /**
     * Show create location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        return view('zones.create');
    }

            /**
     * Store location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'address' => 'sometimes',
        ]);

        $zone = new Zone();
        $zone->name = $request->name;
        $zone->address = $request->address;
        $zone->created_at = date('Y-m-d H:i:s');
        $zone->updated_at = date('Y-m-d H:i:s');
        $zone->save();

        // flash("{$route->name} created.")->success();

        return redirect()->route('zones.index');
    }
}
