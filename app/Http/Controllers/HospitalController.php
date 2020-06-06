<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $hospitals =  Hospital::all();
        return view('hospitals', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->forget('addhospitalstatus');
        return view('addhospital');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($_POST['addhospital'])) {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'city' => 'required|max:255',
                'address' => 'required|max:255',
                'phone' => 'required|Numeric',
                'username' => 'required|unique:users|max:255',
                'password' => 'required|max:255',
                'capacity' => 'required|Numeric',
                'checkins' => 'required|Numeric',
                'checkouts' => 'required|Numeric',
            ]);
            $hospital = new Hospital();
            $hospital->name = $request->name;
            $hospital->city = $request->city;
            $hospital->address = $request->address;
            $hospital->phone = $request->phone;
            $hospital->username = $request->username;
            $hospital->password = Hash::make($request->password);
            $hospital->capacity = $request->capacity;
            $hospital->checkins = $request->checkins;
            $hospital->checkouts = $request->checkouts;
            $hospital->save();
            DB::table('users')->insert(
                [
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'privilege' => 1,
                    'remember_token' => ""
                ]
            );

            $request->session()->put('addhospitalstatus', 'تم اضافة المستشفي');
            return view('addhospital');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        return view('updatehospital');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        //
    }
}
