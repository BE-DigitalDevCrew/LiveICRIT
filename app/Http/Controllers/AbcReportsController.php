<?php

namespace App\Http\Controllers;

use App\Models\AbcReports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AbcReportsController extends Controller
{
    public function index()
    {
        
        $house = Auth::user()->house_name;
        $patients = DB::select("SELECT COUNT(*) AS count FROM patients WHERE house_name = ?", [$house]); 
        return view('staff.viewAbcReport',compact('patients'));
    }

    public function allAbcReports(){

         //get the authenticated users house
         $house = Auth::user()->house_name;
         //select the number of patients database that are based on the users house eg hearten
         $numberOfPatientsInHouse = DB::select("SELECT COUNT(*) AS count FROM patients WHERE house_name = ?", [$house]);           
         //each and every daily entry is going to display a staff name, patient details and daily entry records. the three tables are daily entry, users and patients. the left join joins the three tables and displays the data in the dashboard....
         $abcReports = AbcReports::leftJoin('users', 'abc_reports.user_id', '=', 'users.id')
         ->where('users.house_name', $house)
         ->select(
             'users.username as user_name',
             'users.house_name as house_name',
             'abc_reports.initialsOfPerson',
             'abc_reports.start_time',
             'abc_reports.end_time',
             'abc_reports.influencing_factors',
             'abc_reports.what_happened_before_incident',
             'abc_reports.behaviors',
             'abc_reports.what_happened_after_incident',
             'abc_reports.immediate_actions',
             'abc_reports.done_differently',
             'abc_reports.proact_scip_interventions',
             'abc_reports.medication_administered',
             'abc_reports.physical_contact_injury_intimidation'
         )
         ->orderBy('abc_reports.id', 'desc')
         ->paginate(5);  
        return view("staff.viewAllAbcReports")->with("abcReports",$abcReports);
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
        
        $abcReport = new AbcReports();
        $abcReport->initialsOfPerson = $request->input('initialsOfPerson');
        $abcReport->start_time = $request->input('start_time');
        $abcReport->end_time = $request->input('end_time');
        $abcReport->influencing_factors = $request->input('influencing_factors');
        $abcReport->what_happened_before_incident = $request->input('what_happened_before_incident');
        $abcReport->behaviors = json_encode($request->input('behaviors', []));
        $abcReport->what_happened_after_incident = $request->input('what_happened_after_incident');
        $abcReport->immediate_actions = $request->input('immediate_actions');
        $abcReport->done_differently = $request->input('done_differently');
        $abcReport->proact_scip_interventions = $request->input('proact_scip_interventions');
        $abcReport->medication_administered = $request->input('medication_administered');
        $abcReport->physical_contact_injury_intimidation = $request->input('physical_contact_injury_intimidation');
        $user = Auth::user();
        // Assuming you have a relationship defined between User and ABCReport models
        $user->abcReports()->save($abcReport);
        // If the save operation is successful, return a success response
    // Return an error message to the user
       return redirect('/staff/viewabcreports');

    }
    /**
     * Display the specified resource.
     */
    public function show(AbcReports $aBCReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbcReports $aBCReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ABCReports $aBCReport)
    {
        //
    }

  
    public function destroy(AbcReports $abcReports)
    {
        //
    }
}
