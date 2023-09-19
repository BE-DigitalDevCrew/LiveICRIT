<?php

namespace App\Http\Controllers;

use App\Models\SelfCertificationSickForm;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class SelfCertificationSickFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          //retrieve the patients to the dashboard
        $house = Auth::user()->house;
        return view('pages.getSelfCertificationSickForm');
        
    }

    public function allSelfCertificationReports(){


        // //get the authenticated users house
        $house = Auth::user()->house;
        //select the number of patients database that are based on the users house eg hearten
        $numberOfPatientsInHouse = DB::select("SELECT COUNT(*) AS count FROM patients WHERE house = ?", [$house]);           
        //each and every daily entry is going to display a staff name, patient details and daily entry records. the three tables are daily entry, users and patients. the left join joins the three tables and displays the data in the dashboard....
        $reports = SelfCertificationSickForm::leftJoin('users', 'self_certification_sick_forms.user_id', '=', 'users.id')
         ->where('users.house', $house)
        ->select(
        'users.username as user_name',
        'self_certification_sick_forms.job_title',
        'self_certification_sick_forms.service_department',
        'self_certification_sick_forms.absence_date',
        'self_certification_sick_forms.reason_of_absence',
        'self_certification_sick_forms.absent_due_to_accident',
        'self_certification_sick_forms.consulted_medical_practitioner',
        'self_certification_sick_forms.medical_advice',
        'self_certification_sick_forms.declaration',
        'self_certification_sick_forms.declaration_name',
        'self_certification_sick_forms.declaration_last_name',
        'self_certification_sick_forms.declaration_date',
        )
        ->orderBy('self_certification_sick_forms.id', 'desc') // Update the table alias here if needed
        ->paginate(5);  
        return view('pages.allSelfCertificationReports')->with("reports",$reports);
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
            'job_title' => 'required|string',
            'service_department' => 'required|string',
            'absence_date' => 'required|date',
            'reason_of_absence' => 'required|string',
            'absent_due_to_accident' => 'required|in:Yes,No',
            'consulted_medical_practitioner' => 'required|in:Yes,No',
            'medical_advice' => 'required|string',
            'declaration' => 'required|string',
            'declaration_name' => 'required|string',
            'declaration_last_name' => 'required|string',
            'declaration_date' => 'required|date',
        ]);

        $absence = new SelfCertificationSickForm();
        $absence->job_title = $validatedData['job_title'];
        $absence->user_id = auth()->id();
        $absence->service_department = $validatedData['service_department'];
        $absence->absence_date = $validatedData['absence_date'];
        $absence->reason_of_absence = $validatedData['reason_of_absence'];
        $absence->absent_due_to_accident = $validatedData['absent_due_to_accident'];
        $absence->consulted_medical_practitioner = $validatedData['consulted_medical_practitioner'];
        $absence->medical_advice = $validatedData['medical_advice'];
        $absence->declaration = $validatedData['declaration'];
        $absence->declaration_name = $validatedData['declaration_name'];
        $absence->declaration_last_name = $validatedData['declaration_last_name'];
        $absence->declaration_date = $validatedData['declaration_date'];

        $user = Auth::user();
        //the user is associated with the daily entry. save a daily entry that is associated to the user
        $user->selfCertifications()->save($absence);
        //return back to the screen and use sweet alert to show that the data has been saved
        return back()->with('success', 'Daily Entry added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SelfCertificationSickForm $selfCertificationSickForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SelfCertificationSickForm $selfCertificationSickForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SelfCertificationSickForm $selfCertificationSickForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SelfCertificationSickForm $selfCertificationSickForm)
    {
        //
    }
}
