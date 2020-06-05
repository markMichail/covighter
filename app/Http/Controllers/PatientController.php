<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
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
        $patients = Patient::all();
        return view('patients', compact('patients'));
    }

    public function welcome()
    {
        $hospitals =  Hospital::all();
        return view('welcome', compact('hospitals'));
    }
}
