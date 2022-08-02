<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Liquor;
use App\Izakaya;


class HomeController extends Controller
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
    public function index(Request $request)
    {
        // $posts_liquor = Liquor::all();
        // $posts_izakaya = Izakaya::all();
        
        // $posts_mix = [];
        //     foreach (array_map(null, $posts_liquor, $posts_izakaya) as [$liquor, $izakaya]) {
        //     array_push($posts_mix, $liquor, $izakaya);
        // }
        // return view('home', ['posts_mix' => $posts_mix]);
         $posts_liquor = Liquor::all();
         $posts_izakaya = Izakaya::all(); 
         $posts_mix = $posts_liquor->zip($posts_izakaya);
        //  print_r($posts_mix->all());
        return view('home', ['posts_mix' => $posts_mix]);
    }
}
