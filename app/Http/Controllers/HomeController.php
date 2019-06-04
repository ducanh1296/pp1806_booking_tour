<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $tours = Tour::limit(config('tours.limit'))->get();

        return view('home', ['tours' => $tours]);
    }
}
