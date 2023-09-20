<?php

namespace App\Http\Controllers;

use App\Models\ComplaintRecord;
use App\Models\Complaints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ComplaintsController extends Controller
{
    public function index()
    {   
        $house = Auth::user()->house_name;
        //select all the patients from the table where the house is equal to the hous of the authenticated user
        $patients = DB::select('SELECT * FROM patients WHERE house = ?', [$house]);
        //collect all the patients from the database
        $patients = collect($patients);
        return view('staff.getComplaintRecord')->with("patients",$patients);
    }

    public function store(Request $request)
    {


       
        //dd($request->all());

       /* $validatedData = $request->validate([
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
            'injuries' => 'required|in:yes,no',
            'complaintDate' => 'required|date',
            'position' => 'required|string',
        ]);*/

        $complaintRecord = new Complaints();
        $complaintRecord->phone_number = $request->input('phone_number');
        $complaintRecord->patient_id = $request->input('patient_id');
        $complaintRecord->email = $request->input('email');
        $complaintRecord->address = $request->input('address');
        $complaintRecord->street_address = $request->input('street_address');
        $complaintRecord->city = $request->input('city');
        $complaintRecord->country = $request->input('country');
        $complaintRecord->relative_status = $request->input('relativeStatus');
        $complaintRecord->detailsOfComplaint = $request->input('detailsOfComplaint');
        $complaintRecord->complaintDescription = $request->input('complaintDescription');
        $complaintRecord->recordedBy = $request->input('recordedBy');
        $complaintRecord->complaintDate = $request->input('complaintDate');
        $complaintRecord->position = $request->input('position');
        // Create a new Complaint instance and save it to the database
       //save the behavioural monitor chart
        $user = auth()->user();
        $user->complaintsRecords()->save($complaintRecord);
        return back()->with('success', 'Complaint Recorded Successfully');
     }

     public function allComplaintRecords(){

        $usersHouse = Auth::user()->house_name;
        $complaintRecords = Complaints::leftJoin('patients', 'complaints.patient_id', '=', 'patients.id')
        ->leftJoin('users', 'complaints.user_id', '=', 'users.id')
        ->where('users.house_name', $usersHouse)
        ->select(
            'users.username as user_name',
            'users.house_name as house',
            'patients.patient_name as patient_name',
            'complaints.phone_number', // Fillable field
            'complaints.address', // Fillable field
            'complaints.email', // Fillable field
            'complaints.street_address', // Fillable field
            'complaints.city', // Fillable field
            'complaints.country', // Fillable field
            'complaints.relative_status', // Fillable field
            'complaints.detailsOfComplaint', // Fillable field
            'complaints.complaintDescription', // Fillable field
            'complaints.recordedBy', // Fillable field
            'complaints.injuries', // Fillable field
            'complaints.complaintDate', // Fillable field
            'complaints.position', // Fillable field
            'complaints.created_at'
        )
        ->orderBy('complaints.id', 'desc')
        ->paginate(5);
        return view('staff.allComplaintRecords')->with("complaintRecords",$complaintRecords);
    }
    /**
     * Display the specified resource.
     */
    public function show(ComplaintRecord $complaintRecord)
    {
        //
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComplaintRecord $complaintRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComplaintRecord $complaintRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComplaintRecord $complaintRecord)
    {
        //
    }
}
