<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $id = Hospital::all()->where("username", Auth::user()->username)->first()->id;
        $patients = Patient::all()->where("hospital_id", $id);
        return view('patients', compact('patients'));
    }

    public function create(Request $request)
    {
        $request->session()->forget('addpatientstatus');
        return view('addpatient');
    }

    public function store(Request $request)
    {
        if (isset($_POST['addpatient'])) {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'mobile' => 'required',
                'national_id' => 'required|unique:patients',
                'birthdate' => 'required|Date',
            ]);
            $id = Hospital::all()->where("username", Auth::user()->username)->first()->id;
            $patient = new Patient();
            $patient->hospital_id = $id;
            $patient->name = $request->name;
            $patient->mobile = $request->mobile;
            $patient->national_id = $request->national_id;
            $patient->birthdate = $request->birthdate;
            $patient->checkin = now();
            $patient->save();
            if (now()->diff($patient->birthdate)->y <= 18)
                $age = "0";
            elseif (now()->diff($patient->birthdate)->y > 50)
                $age = "2";
            else
                $age = "1";

            DB::table('symptoms')->insert(
                [
                    'patient_national_id' => $request->national_id,
                    'age' => $age,
                    'fever' => $request->fever == 'on' ? 1 : 0,
                    "dry_cough" => $request->dry_cough  == 'on' ? 1 : 0,
                    "tiredness" => $request->tiredness  == 'on' ? 1 : 0,
                    "aches_and_pains" => $request->aches_and_pains  == 'on' ? 1 : 0,
                    "sore_throat" => $request->sore_throat  == 'on' ? 1 : 0,
                    "conjunctivitis" => $request->conjunctivitis  == 'on' ? 1 : 0,
                    "headache" => $request->headache  == 'on' ? 1 : 0,
                    "diarrhoea" => $request->diarrhoea  == 'on' ? 1 : 0,
                    "loss_of_smell" => $request->loss_of_smell  == 'on' ? 1 : 0,
                    "difficulty_breathing" => $request->difficulty_breathing  == 'on' ? 1 : 0,
                    "chest_pain" => $request->chest_pain  == 'on' ? 1 : 0,
                    "loss_of_speech" => $request->loss_of_speech  == 'on' ? 1 : 0,
                    "loss_of_movement" => $request->loss_of_movement  == 'on' ? 1 : 0,
                    "label" => $request->label,
                ]
            );

            DB::update('update hospitals set checkins = checkins + 1 where id = ?', [$id]);
            DB::update('update hospitals set capacity = capacity - 1 where id = ?', [$id]);

            $request->session()->put('addpatientstatus', 'تم تسجيل المريض');
            return view('addpatient');
        }
    }

    public function exit(Request $request)
    {
        $id = Hospital::all()->where("username", Auth::user()->username)->first()->id;
        $patients = Patient::all()->where("hospital_id", $id)->whereNull('checkout');
        $request->session()->forget('exitpatientstatus');
        return view('exitpatient', compact('patients'));
    }

    public function update(Request $request)
    {
        $request->session()->forget('exitpatientstatus');
        $id = Hospital::all()->where("username", Auth::user()->username)->first()->id;
        $patient = Patient::all()->where('national_id', $request->national_id)->first();
        $patient->checkout = now();
        $patient->save();
        DB::update('update hospitals set checkouts = checkouts + 1 where id = ?', [$id]);
        DB::update('update hospitals set capacity = capacity + 1 where id = ?', [$id]);
        $request->session()->put('exitpatientstatus', 'تم تسجيل خروج المريض');
        $patients = Patient::all()->where("hospital_id", $id)->whereNull('checkout');
        return view('exitpatient', compact('patients'));
    }
}
