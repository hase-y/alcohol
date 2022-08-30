<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Liquor;
use App\Izakaya;
use App\Knob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $posts_liquor = Liquor::inRandomOrder()->take(12)->get();
        $posts_izakaya = Izakaya::inRandomOrder()->take(12)->get();
        $posts_knob = Knob::inRandomOrder()->take(12)->get();
        
        return view('home', ['posts_liquor' => $posts_liquor,'posts_izakaya' => $posts_izakaya, 'posts_knob' => $posts_knob]);
    }
}
