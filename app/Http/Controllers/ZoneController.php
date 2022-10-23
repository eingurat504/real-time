<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZoneCoordinate;
use App\Models\LocationPoint;
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
     * Show Zones
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

        $locations = LocationPoint::get();

        return view('zones.edit',[
            'zone' => $zone,
            'locations' => $locations
        ]);
    }

        /**
     * Show create location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        $locations = LocationPoint::get();

        return view('zones.create',[
            'locations' => $locations
        ]);
    }

            /**
     * Store location type.
     * https://www.positronx.io/laravel-notification-example-create-notification-in-laravel/
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'location_point_id' => 'sometimes|exists:location_points,id',
            'zone_kml' => 'sometimes'
        ]);

        $coor_arr = [];
    
        if (! empty($request->zone_kml)) {
            $this->validate(
                $request,
                [
                    'zone_kml' => 'sometimes|file|max:2048|mimes:csv,xls,xlsx',
                ],
                [
                    'zone_kml.mimes' => 'The :attribute must be a file of either type: csv, xls, or xlsx',
                ]
            );

            $zone = simplexml_load_file($request->zone_kml);

            $coordinates = preg_replace('/\s+/S', ';', trim($zone->Document->Placemark->LineString->coordinates));

            $coordinates = explode(';', $coordinates);

            foreach ($coordinates as $coordinates_str) {
                if (empty($coordinates_str)) {
                    continue;
                }
    
                $coordinate = explode(',', $coordinates_str);
    
                if (count($coordinate) != 3) {
                    return redirect()->back()->withInput($request->input())
                        ->withErrors(['route_kml' => ['Wrongly formed coordinate data.']]);
                }
    
                $coor = [
                    'longitude' => (float) $coordinate[0],
                    'latitude' => (float) $coordinate[1],
                    'altitude' => empty($coordinate[2]) ? 0 : (float) $coordinate[2],
                ];
    
                $coor_arr[] = $coor;
            }

        }

        $zone = new Zone();
        $zone->name = $request->name;
        $zone->location_points_id = $request->location_points_id;
        $zone->status = 1;
        $zone->p_polygon_coordinates = str_replace(';', ',', $request->p_polygon_coordinates);
        $zone->description = $request->description;
        $zone->created_at = date('Y-m-d H:i:s');
        $zone->updated_at = date('Y-m-d H:i:s');
        $zone->save();

        $coordinates = $coor_arr;

        $sequence = 0;

        foreach ($coordinates as $coordinate) {

            $sequence = $sequence + 1;
            
            $coord = new ZoneCoordinate();
            $coord->sequence = $sequence;
            $coord->zone_id = $coordinate[0];
            $coord->latitude = $coordinate[0];
            $coord->longitude = $coordinate[1];
            $coord->created_at = date('Y-m-d H:i:s');
            $coord->updated_at = date('Y-m-d H:i:s');
        }

        return redirect()->route('zones.index');
    }
}
