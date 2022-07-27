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
}
