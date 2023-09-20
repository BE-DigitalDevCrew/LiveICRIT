<?php

namespace App\Http\Controllers;

use App\Models\NewPatients;
use App\Models\Patients;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index()
    {   
        $carer = DB::table('users')->where('type','=','Staff');
        return view('staff.addPatients')->with('users', $carer);
    }

    public function addPatient(){
        return view('super_admin.addpatient');
    }

    public function viewPatient()
    {
      $patients  = Patients::all();
      return view('super_admin.viewpatients', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePatient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'house_name' => 'required|max:255',
            'user_id' => 'required|string|max:255',
            'staff_id' => 'required|max:255',
            'user_id' => 'required|string|max:255',
            'phone_number' => 'required|max:255',
            'address' => 'required|string|max:255',

           
        ],
            [
                'patient_name.required'  => 'Username is required.',
                'email.required' => 'User email is required',
                'house_name.required' => 'User house is required',
                'user_id.required' => 'User ID is required',
                'address.required' => 'User address is required',
                'phone_number' => 'required|max:255',
                'user_id' => 'required|string|max:255',
                'staff_id' => 'required|max:255',
               
            ]
        );
        
        //dd($validator);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patient = NewPatients::create([
            'patient_name'    => $request->input('patient_name'),
            'email'           => $request->input('email'),
            'house_name'      => $request->input('house_name'),
            'address'         => $request->input('address'),
            'phone_number'    => $request->input('phone_number'),
            'user_id'         => $request->input('user_id'),
            'staff_id'         => $request->input('staff_id'),
           
        ]);

      

        $patient->save();

      

        return redirect('staff/viewpatients/')->withSuccess('Patient added Successfully');
    }
}
