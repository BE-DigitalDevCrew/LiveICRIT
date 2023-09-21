<?php

namespace App\Http\Controllers;

use App\Models\MedicationIncident;
use Illuminate\Http\Request;

class MedicationIncidentController extends Controller
{
    public function index()
    {
        $house = Auth::user()->house;
        //select all the patients from the table where the house is equal to the hous of the authenticated user
        $patients = DB::select('SELECT * FROM patients WHERE house = ?', [$house]);
        //collect all the patients from the database
        $patients = collect($patients);
        return view('staff.getMedicationIncident')->with("patients",$patients);
    }

    public function viewAllMedicationIncident(){

        $medicationIncidents = MedicationIncident::select(
            'medication_incidents.*',  // Select all columns from the medication_incidents table
            'patients.patient_name',   // Select the patient_name column from the patients table
            'users.username AS user_name'  // Select the name column from the users table and alias it as user_name
        )
            ->join('patients', 'medication_incidents.patient_id', '=', 'patients.id') // Join with 
            ->join('users', 'medication_incidents.user_id', '=', 'users.id') // Join with users table
            ->get();
        return view("staff.viewAllMedicationIncident")->with("medicationIncidents",$medicationIncidents);


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
            'patient_id' => 'required|integer',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'street_address' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'relativeStatus' => 'required|string',
            'detailsOfComplaint' => 'required|string',
            'complaintDescription' => 'required|string',
            'recordedBy' => 'required|string',
            'injuries' => 'required|string|in:yes,no',
            'complaintDate' => 'required|date',
            'position' => 'required|string',
        ]);

        $user = Auth::user();
        $medicationIncident = new MedicationIncident($validatedData);
        //Save the operation risk assessment
        $user->medicationIncidentReports()->save($medicationIncident);
        // Create a new MedicationIncident instance and fill it with validated data
        // Save the MedicationIncident to the database
        // Optionally, you can redirect to a success page or return a response
        return back()->with('success', 'Saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicationIncident $medicationIncident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicationIncident $medicationIncident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicationIncident $medicationIncident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicationIncident $medicationIncident)
    {
        //
    }
}
