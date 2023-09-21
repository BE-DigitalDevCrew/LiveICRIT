<?php

namespace App\Http\Controllers;

use App\Models\FallsChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FallsChecklistController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $house = Auth::user()->house_name;
        $query = "
                select * from patients where house = :house
         ";
        $patients = DB::select($query, ['house' => $house]);
        return view('staff.getFallsCheckList')->with("patients",$patients);
    }

    public function allFallsChecklists(){

        $usersHouse = Auth::user()->house_name;
        $checkLists = FallsChecklist::leftJoin('patients', 'falls_checklists.patient_id', '=', 'patients.id')
            ->leftJoin('users', 'falls_checklists.user_id', '=', 'users.id')
            ->where('users.house_name', $usersHouse)
            ->select(
                'users.username as user_name',
                'users.house_name as house',
                'patients.patient_name as patient_name',
                'falls_checklists.date', // Fillable field
                'falls_checklists.incident_ref',
                'falls_checklists.completed_by',
                'falls_checklists.completed_by',
                'falls_checklists.health_concern', // Fillable field
                'falls_checklists.personal_care', 
                'falls_checklists.breathing', 
                'falls_checklists.head_injury', 
                'falls_checklists.fall_distance', 
                'falls_checklists.serious_injury_suspected',
                'falls_checklists.bleeding_or_skin_tear',
                'falls_checklists.unusual_pain',
                'falls_checklists.weight_bear',
                'falls_checklists.weight_bear',
                'falls_checklists.recommend_attendance',
                'falls_checklists.use_hoist', // Fillable field
                'falls_checklists.hoist_not_used_space', // Fillable field
                'falls_checklists.comments_space', // Fillable field
                'falls_checklists.hoist_not_used_dignity', // Fillable field
                'falls_checklists.comments_dignity', // Fillable field
                'falls_checklists.comments_position', // Fillable field
                'falls_checklists.comments_other', // Fillable field
                'falls_checklists.handling_belt_used', // Fillable field
                'falls_checklists.pain_altered', // Fillable field
                'falls_checklists.able_to_walk', // Fillable field
                'falls_checklists.immediate_cause', // Fillable field
                
            )
            ->orderBy('falls_checklists.id', 'desc')
            ->paginate(5);
            return view('staff.viewAllFallsChecklists')->with("checkLists",$checkLists);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'patient_id' => 'required',
            'date' => 'required|date',
            'incident_ref' => 'required',
            'completed_by' => 'required',
            'health_concern' => 'required',
            'personal_care' => 'required',
            'breathing' => 'required',
            'head_injury' => 'required',
            'fall_distance' => 'required',
            'serious_injury_suspected' => 'required',
            'bleeding_or_skin_tear' => 'required',
            'unusual_pain' => 'required',
            'weight_bear' => 'required',
            'recommend_attendance' => 'required',
            'use_hoist' => 'required',
            'hoist_not_used_space' => 'required',
            'comments_space' => 'required',
            'hoist_not_used_dignity' => 'required',
            'comments_dignity' => 'required',
            'comments_position' => 'required',
            'comments_other' => 'required',
            'handling_belt_used' => 'required',
            'comments_belt' => 'required',
            'pain_altered' => 'required',
            'able_to_walk' => 'required',
            'immediate_cause' => 'required',
        ]);

          // Validate the form data
          //$validatedData = $request->validate($validatedData);

          // Create a new Incident model instance and fill it with the form data
          $user = Auth::user();
          //Save the operation risk assessment
          // Create a new SeizureReport instance with validated data
          $user->fallsCheckLists()->create($validatedData);
          // Create a new MedicationIncident instance and fill it with validated data
          // Save the MedicationIncident to the database
          // Optionally, you can redirect to a success page or return a response
          return back()->with('success', 'Falls CheckList Added');
   
        }

    /**
     * Display the specified resource.
     */
    public function show(FallsCheklist $fallsCheklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FallsCheklist $fallsCheklist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FallsCheklist $fallsCheklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FallsCheklist $fallsCheklist)
    {
        //
    }
}
