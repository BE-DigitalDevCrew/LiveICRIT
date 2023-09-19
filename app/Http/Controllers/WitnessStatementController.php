<?php

namespace App\Http\Controllers;

use App\Models\WitnessStatement;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class WitnessStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showWitnessStatement(){

        return view("pages.witnessStatement");
    }

    public function viewAllWitnessStatements(){

        $statements = DB::table('witness_statements')
        ->join('users', 'witness_statements.user_id', '=', 'users.id')
        ->select(
            'users.username',
            'witness_statements.injured_person',
            'witness_statements.ref_number',
            'witness_statements.injured_person',
            'witness_statements.date_of_accident',
            'witness_statements.time_of_accident',
            'witness_statements.witness_dob',
            'witness_statements.witness_homeaddress',
            'witness_statements.street_address',
            'witness_statements.city',
            'witness_statements.county',
            'witness_statements.tel_number',
            'witness_statements.fitzRoyEmployee',
            'witness_statements.occupation',
            'witness_statements.what_happened',
            'witness_statements.position',
            'witness_statements.description_accident',
            'witness_statements.where_were_you_positioned',
            'witness_statements.any_other_information',
        )
        ->get();
        return view("pages.viewAllWitnessStatements")->with("statements",$statements);
    
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
            $request->validate([
            'ref_number' => 'required|string|max:255',
            'injured_person' => 'required|string|max:255',
            'date_of_accident' => 'required|date',
            'time_of_accident' => 'required|date',
            'witness_dob' => 'required|date',
            'witness_homeaddress' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'county' => 'required|string|max:255',
            'tel_number' => 'required|string|max:255',
            'fitzRoyEmployee' => 'required|in:Yes,No',
            'occupation' => 'required|string|max:255',
            'what_happened' => 'required|string',
            'position' => 'nullable|array',
            'position.*' => 'string', // If you want to validate individual checkbox values
            'description_accident' => 'required|string',
            'where_were_you_positioned' => 'required|string',
            'any_other_information' => 'required|string',
        ]);

$complaintRecord = new WitnessStatement();
$complaintRecord->ref_number = $request->input('ref_number');
$complaintRecord->injured_person = $request->input('injured_person');
$complaintRecord->date_of_accident = $request->input('date_of_accident');
$complaintRecord->time_of_accident = $request->input('time_of_accident');
$complaintRecord->witness_dob = $request->input('witness_dob');
$complaintRecord->witness_homeaddress = $request->input('witness_homeaddress');
$complaintRecord->street_address = $request->input('street_address');
$complaintRecord->city = $request->input('city');
$complaintRecord->county = $request->input('county');
$complaintRecord->tel_number = $request->input('tel_number');
$complaintRecord->fitzRoyEmployee = $request->input('fitzRoyEmployee');
$complaintRecord->occupation = $request->input('occupation');
$complaintRecord->what_happened = $request->input('what_happened');
// Convert the $position array to a JSON string
$position = $request->input('position', []);
$complaintRecord->position = json_encode($position);
$complaintRecord->description_accident = $request->input('description_accident');
$complaintRecord->where_were_you_positioned = $request->input('where_were_you_positioned');
$complaintRecord->any_other_information = $request->input('any_other_information');
$user = Auth::user(); 
$user->witnessStatements()->save($complaintRecord);
return back()->with('success', 'Witness Statement Saved');

}
    public function show(WitnessStatement $witnessStatement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WitnessStatement $witnessStatement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WitnessStatement $witnessStatement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WitnessStatement $witnessStatement)
    {
        //
    }
}
