<?php

namespace App\Http\Controllers;

use App\Models\OperationRiskAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OperationRiskAssessmentController extends Controller
{
    public function index()
    {
        //
          //
          $house = Auth::user()->house_name;
          $query = "
                  select * from patients where house = :house
           ";
          $patients = DB::select($query, ['house' => $house]);
          return view('staff.getOperationsRiskAssessment')->with("patients",$patients);
    }

    public function allOperationRiskAssessments(){

        $house = Auth::user()->house_name;
        //select the number of patients database that are based on the users house eg hearten
        $numberOfPatientsInHouse = DB::select("SELECT COUNT(*) AS count FROM patients WHERE house = ?", [$house]);           
        //each and every daily entry is going to display a staff name, patient details and daily entry records. the three tables are daily entry, users and patients. the left join joins the three tables and displays the data in the dashboard....
        $data = OperationRiskAssessment::leftJoin('patients', 'operation_risk_assessments.patient_id', '=', 'patients.id')
        ->leftJoin('users', 'operation_risk_assessments.user_id', '=', 'users.id')
        ->where('users.house_name', $house)
        ->select(
            'users.username as user_name',
            'patients.patient_name',
            'operation_risk_assessments.assessors_email',
            'operation_risk_assessments.assessment_date',
            'operation_risk_assessments.what_causes_harm',
            'operation_risk_assessments.where_is_the_hazard',
            'operation_risk_assessments.who_might_be_harmed',
            'operation_risk_assessments.how_will_they_be_harmed',
            'operation_risk_assessments.how_often_are_exposed_hazard',
            'operation_risk_assessments.how_long_exposed_hazard',
            'operation_risk_assessments.disallowing_activity',
            'operation_risk_assessments.comment',
            'operation_risk_assessments.likelihood_harm',
            'operation_risk_assessments.list_of_control_measures',
            'operation_risk_assessments.date_when_control_measures_implemented',
            'operation_risk_assessments.identity_training_required_risk',
            'operation_risk_assessments.identity_training_was_specified',
            'operation_risk_assessments.identity_equipment_reduced_risk',
            'operation_risk_assessments.date_equipment_provided',
            'operation_risk_assessments.likelihood_radio_harm',
            'operation_risk_assessments.how_serious_harm_radio',
            'operation_risk_assessments.additional_control_measures',
            'operation_risk_assessments.risk_assessment_drawn_by',
            'operation_risk_assessments.risk_assessment_date',
            'operation_risk_assessments.risk_assessment_date',
            'operation_risk_assessments.assessment_taken_mental',
            'operation_risk_assessments.please_comment_any_behaviours',
            'operation_risk_assessments.positive_liberty_issue',
            'operation_risk_assessments.outcome_best_interest_radio',
            'operation_risk_assessments.date_of_review',
            'operation_risk_assessments.changes_required',
            'operation_risk_assessments.managers_name',
            'operation_risk_assessments.risk_assessment_Activity_accessed',
            'operation_risk_assessments.date_of_assessment',
            'operation_risk_assessments.signage_name',
            'operation_risk_assessments.signage_date',
            )
        ->orderBy('operation_risk_assessments.id', 'desc')
        ->paginate(5); 
        return view("staff.allOperationRiskAssessments")->with("data",$data);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        //dd($request->all());


        /*$validatedData = $request->validate([
            'assessment_date' => 'required|date',
            'accessors_email_1' => 'required|email',
            'accessors_email_2' => 'required|email',
            'patient_id' => 'required|exists:patients,id', // Assuming "patients" is the patients table
            'what_causes_harm' => 'required|string',
            'where_is_the_hazard' => 'required|string',
            'who_might_be_harmed' => 'required|string',
            'how_will_they_be_harmed' => 'required|string',
            'how_often_are_exposed_hazard' => 'required|string',
            'how_long_exposed_hazard' => 'required|string',
            'disallowing_activity' => 'required|in:Yes,No',
            'comment' => 'required|string',
            'likelihood_harm' => 'required|in:Unlikely,No,Very Likely',
            'how_serious_harm' => 'required|in:No Injury,Minor Injury,Major Injury,Death',
            'list_of_control_measures' => 'required|string',
            'date_when_control_measures_implemented' => 'required|date',
            'identity_training_required_risk' => 'required|string',
            'identity_training_was_specified' => 'required|date',
            'identity_equipment_reduced_risk' => 'required|string',
            'date_equipment_provided' => 'required|date',
            'likelihood_radio_harm' => 'required|in:Unlikely,No,Very Likely',
            'how_serious_harm_radio' => 'required|in:No Injury,Minor Injury,Major Injury,Death',
            'additional_control_measures' => 'required|string',
            'completion_control_measures' => 'required|date',
            'risk_assessment_drawn_by' => 'required|string',
            'risk_assessment_date' => 'required|date',
            'assessment_taken_mental' => 'required|in:Yes,No',
            'please_comment_any_behaviours' => 'required|string',
            'positive_liberty_issue' => 'required|in:Yes,No',
            'outcome_best_interest_radio' => 'required|in:Yes,No',
            'date_of_review' => 'required|date',
            'changes_required' => 'required|string',
            'managers_name' => 'required|string',
            'risk_assessment_Activity_accessed' => 'required|string',
            'date_of_assessment' => 'required|date',
            'signage_name' => 'required|string',
            'signage_date' => 'required|date',
        ]);
        */
        $riskAssessment = new OperationRiskAssessment();
        $riskAssessment->assessment_date = $request->input('assessment_date');
        $riskAssessment->assessors_email = $request->input('accessors_email');
        $riskAssessment->patient_id = $request->input('patient_id');
        $riskAssessment->what_causes_harm = $request->input('what_causes_harm');
        $riskAssessment->where_is_the_hazard = $request->input('where_is_the_hazard');
        $riskAssessment->who_might_be_harmed = $request->input('who_might_be_harmed');
        $riskAssessment->how_will_they_be_harmed = $request->input('how_will_they_be_harmed');
        $riskAssessment->how_often_are_exposed_hazard = $request->input('how_often_are_exposed_hazard');
        $riskAssessment->how_long_exposed_hazard = $request->input('how_long_exposed_hazard');
        $riskAssessment->disallowing_activity = $request->input('disallowing_activity');
        $riskAssessment->comment = $request->input('comment');
        $riskAssessment->likelihood_harm = $request->input('likelihood_harm');
        $riskAssessment->how_serious_harm_radio = $request->input('how_serious_harm_radio');
        $riskAssessment->list_of_control_measures = $request->input('list_of_control_measures');
        $riskAssessment->date_when_control_measures_implemented = $request->input('date_when_control_measures_implemented');
        $riskAssessment->identity_training_required_risk = $request->input('identity_training_required_risk');
        $riskAssessment->identity_training_was_specified = $request->input('identity_training_was_specified');
        $riskAssessment->identity_equipment_reduced_risk = $request->input('identity_equipment_reduced_risk');
        $riskAssessment->date_equipment_provided = $request->input('date_equipment_provided');
        $riskAssessment->likelihood_radio_harm = $request->input('likelihood_radio_harm');
        $riskAssessment->additional_control_measures = $request->input('additional_control_measures');
        $riskAssessment->completion_control_measures = $request->input('completion_control_measures');
        $riskAssessment->risk_assessment_drawn_by = $request->input('risk_assessment_drawn_by');
        $riskAssessment->risk_assessment_date = $request->input('risk_assessment_date');
        $riskAssessment->assessment_taken_mental = $request->input('assessment_taken_mental');
        $riskAssessment->please_comment_any_behaviours = $request->input('please_comment_any_behaviours');
        $riskAssessment->positive_liberty_issue = $request->input('positive_liberty_issue');
        $riskAssessment->outcome_best_interest_radio = $request->input('outcome_best_interest_radio');
        $riskAssessment->comment = $request->input('comment');
        $riskAssessment->date_of_review = $request->input('date_of_review');
        $riskAssessment->changes_required = $request->input('changes_required');
        $riskAssessment->managers_name = $request->input('managers_name');
        $riskAssessment->risk_assessment_Activity_accessed = $request->input('risk_assessment_Activity_accessed');
        $riskAssessment->date_of_assessment = $request->input('date_of_assessment');
        $riskAssessment->signage_name = $request->input('signage_name');
        $riskAssessment->signage_date = $request->input('signage_date');
        // Find the authenticated user (assuming you are working with authenticated users)
        $user = auth()->user();
        // Create a new OperationRiskAssessment instance and associate it with the user
        //$operationRiskAssessment = new OperationRiskAssessment($validatedData);
        // Save the operation risk assessment
        $user->operationRiskAssessments()->save($riskAssessment);
        // Optionally, you can add a success message or redirect to another page
        return back()->with('success', 'Operation Risk Assessment Saved');
    
    }
    /**
     * Display the specified resource.
     */
    public function show(OperationRiskAssessment $operationRiskAssessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OperationRiskAssessment $operationRiskAssessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OperationRiskAssessment $operationRiskAssessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperationRiskAssessment $operationRiskAssessment)
    {
        //
    }
}
