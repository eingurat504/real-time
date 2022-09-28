<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
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
    public function report()
    {
        // $routes = Incident::get();

        return view('reports.device',[
            // 'routes' => $routes
        ]);
    }


        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getCameras()
    {

        return view('cameras.index',[
            // 'routes' => $routes
        ]);
    }
}
