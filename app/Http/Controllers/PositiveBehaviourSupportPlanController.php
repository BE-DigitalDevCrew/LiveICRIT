<?php

namespace App\Http\Controllers;

use App\Models\PositiveBehaviourSupportPlan;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class PositiveBehaviourSupportPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $house = Auth::user()->house;
        $query = "
               select * from patients where house = :house
        ";
         // Execute the raw SQL query with the user ID parameter
        $patients = DB::select($query, ['house' => $house]);
        return view('pages.getPositiveBehaviourSupport')->with("patients",$patients);
    }

    public function viewAllPositivePlans(){

        $usersHouse = Auth::user()->house;
        $supportPlans = PositiveBehaviourSupportPlan::leftJoin('patients', 'positive_behaviour_support_plans.patient_id', '=', 'patients.id')
            ->leftJoin('users', 'positive_behaviour_support_plans.user_id', '=', 'users.id')
            ->where('users.house', $usersHouse)
            ->select(
                'users.username as user_name',
                'users.house as house',
                'patients.patient_name as patient_name',
                'positive_behaviour_support_plans.*',
            )
            ->orderBy('positive_behaviour_support_plans.id', 'desc')
            ->paginate(5);
            return view("pages.viewAllPositiveBehaviourCharts")->with("supportPlans",$supportPlans);
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
        //
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'todays_date' => 'required|date',
            'review_date' => 'required|date',
            'home_location' => 'required|string',
            'street_address' => 'required|string',
            'city' => 'required|string',
            'county' => 'required|string',
            'completed_by' => 'required|string',
            'behaviors_when_happy_angry' => 'required|string',
            'triggers' => 'required|string',
            'actions' => 'required|string',
            'behaviour_calm' => 'required|string',
            'support' => 'required|string',
            'behaviour_relaxed' => 'required|string',
            'support_strategies' => 'required|string',
            'recovery_period' => 'required|string',
            'behaviour_crisis' => 'required|string',
            'tablet_liquid' => 'required|string',
            'strength' => 'required|string',
            'route_admin' => 'required|string',
            'dose_intervals' => 'required|string',
            'dose_max' => 'required|string',
            'consulted_medical_practitioner' => 'required|in:Yes,No',
            'special_instructions' => 'required|string',
            'reasons_admin' => 'required|string',
            'name_medicine' => 'required|string',
            'medication' => 'required|in:Prescribed,Over The Counter',
            'condition' => 'required|string',
            'history' => 'required|string',
            'documentation' => 'required|string',
            'personal_care' => 'required|string',
            'family_views' => 'required|string',
            'person_views' => 'required|string',
            'controls_agreed' => 'required|in:Yes,No',
            'deprivation_of_liberty' => 'required|in:Yes,No',
            'name_aknowledged' => 'required|string',
            'position' => 'required|string',
            'role' => 'required|string',
            'staff_email' => 'required|string|email',
         ]);
          //Find the authenticated user (assuming you are working with authenticated users)
          $user = auth()->user();
          //Create a new OperationRiskAssessment instance and associate it with the user
          $plan = new PositiveBehaviourSupportPlan($validatedData); 
          $user->positiveBehaviourSupports()->save($plan);
          return back()->with('success', 'Behaviour Support Plan Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(PositiveBehaviourSupportPlan $positiveBehaviourSupportPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PositiveBehaviourSupportPlan $positiveBehaviourSupportPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PositiveBehaviourSupportPlan $positiveBehaviourSupportPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PositiveBehaviourSupportPlan $positiveBehaviourSupportPlan)
    {
        //
    }
}
