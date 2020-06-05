<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;

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
    public function index()
    {
        $hospitals =  Hospital::all();
        return view('home', compact('hospitals'));
    }

    public function welcome()
    {
        $hospitals =  Hospital::all();
        return view('welcome', compact('hospitals'));
    }
}
