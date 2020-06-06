<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Phpml\Classification\KNearestNeighbors;

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

    public function test(Request $request)
    {
        $request->session()->forget('labelstatus');
        return view('test');
    }

    public function checktest(Request $request)
    {
        if (isset($_POST['test'])) {

            $samples = DB::select('select age as "0" ,
            fever as "1",
            dry_cough as "2" ,
            tiredness as "3",
            aches_and_pains as "4",
            sore_throat as "5",
            diarrhoea as "6",
            conjunctivitis as "7",
            headache as "8",
            loss_of_smell as "9", 
            difficulty_breathing as "10", 
            chest_pain as "11",
            loss_of_speech as "12",
            loss_of_movement as "13"
            from symptoms');

            $array = json_decode(json_encode($samples), true);

            $labels = DB::select('select label from symptoms');
            $finallabels = array_column($labels, 'label');

            $classifier = new KNearestNeighbors($k = 1);
            $classifier->train($array, $finallabels);

            $validatedData = $request->validate([
                'national_id' => 'required',
                'birthdate' => 'required|Date',
            ]);
            if (now()->diff($request->birthdate)->y <= 18)
                $age = "0";
            elseif (now()->diff($request->birthdate)->y > 50)
                $age = "2";
            else
                $age = "1";


            $data = [
                $age,
                $request->fever == 'on' ? 1 : 0,
                $request->dry_cough == 'on' ? 1 : 0,
                $request->tiredness == 'on' ? 1 : 0,
                $request->aches_and_pains == 'on' ? 1 : 0,
                $request->sore_throat == 'on' ? 1 : 0,
                $request->conjunctivitis == 'on' ? 1 : 0,
                $request->headache == 'on' ? 1 : 0,
                $request->diarrhoea == 'on' ? 1 : 0,
                $request->loss_of_smell == 'on' ? 1 : 0,
                $request->difficulty_breathing == 'on' ? 1 : 0,
                $request->chest_pain == 'on' ? 1 : 0,
                $request->loss_of_speech == 'on' ? 1 : 0,
                $request->loss_of_movement == 'on' ? 1 : 0
            ];

            $label = $classifier->predict($data);

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
                    "label" => $label,
                ]
            );

            $request->session()->put('labelstatus', $label == 0 ? "low" : "high");
            return view('test');
        }
    }
}
