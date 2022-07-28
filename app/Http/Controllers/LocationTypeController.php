<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationType;

class LocationTypeController extends Controller
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
        $types = LocationType::get();

        return view('location_types.index',[
            'types' => $types
        ]);
    }

         /**
     * Show location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($typeId)
    {
        $type = LocationType::findorfail($typeId);

        return view('location_types.show',[
            'type' => $type
        ]);
    }

            /**
     * Show Edit location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $typeId)
    {
        $type = LocationType::findorfail($typeId);

        return view('location_types.edit',[
            'type' => $type
        ]);
    }

        /**
     * Show create location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        return view('location_types.create');
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

        $type = new LocationType();
        $type->name = $request->name;
        $type->address = $request->address;
        $type->created_at = date('Y-m-d H:i:s');
        $type->updated_at = date('Y-m-d H:i:s');
        $type->save();

        // flash("{$route->name} created.")->success();

        return redirect()->route('location_types.index');
    }
}
