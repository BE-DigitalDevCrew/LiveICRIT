<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SeizureReport;
use Illuminate\Support\Facades\DB;

class SeizureReportController extends Controller
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
        return view('pages.getSeizureReport')->with("patients",$patients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function viewAllSeizureReports()
    {
        //
        $usersHouse = Auth::user()->house;
        $seizureReports = SeizureReport::leftJoin('patients', 'seizure_reports.patient_id', '=', 'patients.id')
            ->leftJoin('users', 'seizure_reports.user_id', '=', 'users.id')
            ->where('users.house', $usersHouse)
            ->select(
                'users.username as user_name',
                'users.house as house',
                'patients.patient_name as patient_name',
                'seizure_reports.date_of_incident', // Fillable field
                'seizure_reports.time_of_incident', // Fillable field
                'seizure_reports.other_forms_1', // Fillable field
                'seizure_reports.other_forms_2', // Fillable field
                'seizure_reports.did_fall', // Fillable field
                'seizure_reports.initials_of_harm', // Fillable field
                'seizure_reports.incident_description', // Fillable field
                'seizure_reports.any_causes_to_incident', // Fillable field
                'seizure_reports.any_other_forms', // Fillable field
                'seizure_reports.did_stiffen', // Fillable field
                'seizure_reports.loss_of_consciousness', // Fillable field
                'seizure_reports.colour_change', // Fillable field
                'seizure_reports.movement', // Fillable field
                'seizure_reports.breathing_difficulty', // Fillable field
                'seizure_reports.parts', // Fillable field
                'seizure_reports.how_long_seizure', // Fillable field
                'seizure_reports.yes_incontinence', // Fillable field
                'seizure_reports.condition_after_seizure', // Fillable field
                'seizure_reports.recovery_date', // Fillable field
                'seizure_reports.person_injury', // Fillable field
                'seizure_reports.treatment', // Fillable field
                'seizure_reports.triggers', // Fillable field
                'seizure_reports.reported_by', // Fillable field
                'seizure_reports.report_date', // Fillable field
                // Fillable field
            )
            ->orderBy('seizure_reports.id', 'desc')
            ->paginate(5);
        return view("pages.viewAllSeizureReports")->with("seizureReports",$seizureReports);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        //
         // Validate the form data
           /*() $validatedData = $request->validate([
            'ref_number' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'patient_id' => 'required|exists:patients,id', // Assuming 'patients' is the name of your patients table
            'date_of_incident' => 'required|date',
            'time_of_incident' => 'required|date_format:H:i',
            'other_forms_1' => 'array', // Assuming this should be an array
            'other_forms_2' => 'array', // Assuming this should be an array
            'did_fall' => 'required|string|max:255',
            'initials_of_harm' => 'required|string|max:255',
            'incident_description' => 'required|string',
            'any_causes_to_incident' => 'required|string',
            'any_other_forms' => 'array', // Assuming this should be an array
            'did_stiffen' => 'required|string|max:255',
            'loss_of_consciousness' => 'required|string|max:255',
            'colour_change' => 'required|string|max:255',
            'movement' => 'required|string|max:255',
            'breathing_difficulty' => 'required|string|max:255',
            'parts' => 'array', // Assuming this should be an array
            'how_long_seizure' => 'required|string|max:255',
            'yes_incontinence' => 'required|string|max:255',
            'no_incontinence' => 'required|string|max:255',
            'condition_after_seizure' => 'array', // Assuming this should be an array
            'recovery_date' => 'required|string|max:255',
            'person_injury' => 'required|string|max:255',
            'treatment' => 'required|string',
            'triggers' => 'array', // Assuming this should be an array
            'reported_by' => 'required|string|max:255',
            'report_date' => 'required|date',
            ]);*/
             // dd($request->input("conciousness"));
$seizureReport = new SeizureReport();
$seizureReport->ref_number = $request->input('ref_number');
$seizureReport->location = $request->input('location');
$seizureReport->patient_id = $request->input('patient_id');
$seizureReport->date_of_incident = $request->input('date_of_incident');
$seizureReport->time_of_incident = $request->input('time_of_incident');
$seizureReport->other_forms_1 = json_encode($request->input('other_forms_1', []));
$seizureReport->other_forms_2 = json_encode($request->input('other_forms_2', []));
$seizureReport->did_fall = $request->input('did_fall');
$seizureReport->initials_of_harm = $request->input('initials_of_harm');
$seizureReport->incident_description = $request->input('incident_description');
$seizureReport->any_causes_to_incident = $request->input('any_causes_to_incident');
$seizureReport->any_other_forms = json_encode($request->input('any_other_forms', []));
$seizureReport->did_stiffen = $request->input('stiffen');
$seizureReport->loss_of_consciousness = $request->input('conciousness');
$seizureReport->colour_change = $request->input('color');
$seizureReport->movement = $request->input('movement');
$seizureReport->breathing_difficulty = $request->input('breathing');
$seizureReport->parts = json_encode($request->input('parts', []));
$seizureReport->how_long_seizure = $request->input('how_long_seizure');
$seizureReport->yes_incontinence = $request->input('incontinence');
$seizureReport->condition_after_seizure = json_encode($request->input('condition_after_seizure', []));
$seizureReport->recovery_date = $request->input('recovery_date');
$seizureReport->person_injury = $request->input('person_injury');
$seizureReport->treatment = $request->input('treatment');
$seizureReport->triggers = json_encode($request->input('triggers', []));
$seizureReport->reported_by = $request->input('reported_by');
$seizureReport->report_date = $request->input('report_date');
$user = auth()->user();
//Create a new OperationRiskAssessment instance and associate it with the user
$user->seizureReports()->save($seizureReport);
        return back()->with('success', 'Seizure Report Added');
        // Populate other fields in a similar manner

    }

    /**
     * Display the specified resource.
     */
    public function show(SeizureReport $seizureReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeizureReport $seizureReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeizureReport $seizureReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeizureReport $seizureReport)
    {
        //
    }
}
