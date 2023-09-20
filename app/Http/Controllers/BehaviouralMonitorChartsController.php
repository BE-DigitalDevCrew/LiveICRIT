<?php

namespace App\Http\Controllers;

use App\Models\BehaviouralMonitorCharts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BehaviouralMonitorChartsController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $house = Auth::user()->house_name;
        //select all the patients from the table where the house is equal to the hous of the authenticated user
        $patients = DB::select('SELECT * FROM patients WHERE house = ?', [$house]);
        //collect all the patients from the database
        $patients = collect($patients);
        return view('staff.behaviouralMonitorChart')->with("patients",$patients);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function allBehaviouralSupportPlans(){
    $usersHouse = Auth::user()->house_name;
    $supportPlans = BehaviouralMonitorCharts::leftJoin('patients', 'behavioural_monitor_charts.patient_id', '=', 'patients.id')
    ->leftJoin('users', 'behavioural_monitor_charts.user_id', '=', 'users.id')
    ->where('users.house_name', $usersHouse)
    ->select(
        'users.username as user_name',
        'users.house_name as house',
        'patients.patient_name as patient_name',
        'behavioural_monitor_charts.date',
        'behavioural_monitor_charts.known_behaviours',
        'behavioural_monitor_charts.totals',
        'behavioural_monitor_charts.time',
        'behavioural_monitor_charts.known_behaviour_reference',
        'behavioural_monitor_charts.comments',
        'behavioural_monitor_charts.injuries',
        'behavioural_monitor_charts.initials',
        'behavioural_monitor_charts.created_at'
    )
    ->orderBy('behavioural_monitor_charts.id', 'desc')
    ->paginate(5);
    return view('staff.allBehaviourSupportPlans')->with("supportPlans",$supportPlans);
    }
    
    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'patient_id' => 'required|integer', // Add more validation rules as needed
            'date' => 'required|date',
            'knownBehaviours' => 'required|string',
            'totals' => 'required|string',
            'time' => 'required|date_format:H:i',
            'knownBehaviourReference' => 'required|string',
            'comments' => 'required|string',
            'injuries' => 'required|in:yes,no', // Allow only 'yes' or 'no'
            'initials' => 'required|string',
         ]);

          //Create a new BehaviorChart instance and fill it with validated data
          $behaviorChart = new BehaviouralMonitorCharts();
          $behaviorChart->patient_id = $validatedData['patient_id'];
          $behaviorChart->date = $validatedData['date'];
          $behaviorChart->known_behaviours = $validatedData['knownBehaviours'];
          $behaviorChart->totals = $validatedData['totals'];
          $behaviorChart->time = $validatedData['time'];
          $behaviorChart->known_behaviour_reference = $validatedData['knownBehaviourReference'];
          $behaviorChart->comments = $validatedData['comments'];
          $behaviorChart->injuries = $validatedData['injuries'];
          $behaviorChart->initials = $validatedData['initials'];

          //save the behavioural monitor chart
          $user = auth()->user();
          $user->behaviouralCharts()->save($behaviorChart);
          return back()->with('success', 'Behaviour Monitor Chart Saved');
    }


    /**
     * Display the specified resource.
     */
    public function show(BehaviouralMonitorChart $behaviouralMonitorChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BehaviouralMonitorChart $behaviouralMonitorChart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BehaviouralMonitorChart $behaviouralMonitorChart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BehaviouralMonitorChart $behaviouralMonitorChart)
    {
        //
    }
}
