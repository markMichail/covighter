<?php

namespace App\Http\Controllers;

use App\Hospital;

class WelcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hospitals =  Hospital::all();
        return view('welcome', compact('hospitals'));
    }
}
