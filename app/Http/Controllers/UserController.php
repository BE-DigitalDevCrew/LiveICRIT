<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\NewUserCreated;
use App\Models\Patients;
use App\Models\Houses;
use App\Models\DailyEntry;
use Illuminate\Support\Facades\Validator;
use Str;
use Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNull('approved_at')->get();

        return view('super_admin.viewusers', compact('users'));
    }

    public function addUser(){
        $houses = Houses::all();
        return view('super_admin.adduser',compact('houses'));
    }

    public function viewUser(){
        $users  = User::all();
        return view('super_admin.viewusers', compact('users'));
    }

    public function storeUser(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'house' => 'required|max:255',
            'type' => 'required|string|max:255',
           
        ],
            [
                'username.required'  => 'Username is required.',
                'email.required' => 'User email is required',
                'email.required' => 'User email is required',
                'house.required' => 'User house is required',
                'type.required' => 'User role is required',
            ]
        );
        
        //dd($validator);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

       
        $randPassword = Str::random(8);

        $user = User::create([
            'username'    => $request->input('username'),
            'email'       => $request->input('email'),
            'house'       => $request->input('house'),
            'type'       => $request->input('type'),
            'password'   => Hash::make($randPassword),
        ]);

       // dd($user);

        $user->save();

        if ($user->save()){
            event(new NewUserCreated($user, $randPassword));

        }

        return redirect('admin/viewusers/');
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }

    //Manage Patients 
    public function addPatient(){
        $houses = Houses::all();
        $carers = User::all()->where('type','=','Staff');
        return view('staff.addPatients',compact('houses','carers'));
    }

    public function viewPatients(){
        $patients  = Patients::all();
        return view('staff.viewMyPatients', compact('patients'));
    }

    public function storePatient(Request $request){
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

        $patient = Patients::create([
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
    //Manage Daily Entries 
    public function addDailyEntry(){
        $houses = Houses::all();
        $patients = Patients::all();
        $carers = User::all()->where('type','=','Staff');
        return view('staff.dailyEntry',compact('houses','carers','patients'));
    }

    public function viewEntryRecord(){
        $patients  = DailyEntry::all();
        return view('staff.viewEntries', compact('patients'));
    }

    public function storeEntryRecord(Request $request){

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'shift' => 'required',
            'patient_name' => 'required',
            'personal_care' => 'required',
            'medication_admin' => 'required', 
            'activities' => 'required', 
            'incident' => 'required',

           
        ],
            [
                'date.required'  => 'Username is required.',
                'shift.required' => 'User email is required',
                'patient_name.required' => 'User name is required',
                'personal_care.required' => 'User address is required',
                'medication_admin' => 'required|max:255',
                'activities' => 'required|string|max:255',
                'incident' => 'required|max:255',
               
            ]
        );

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
       
        $dailyEntry = DailyEntry::create([
            'date'    => $request->input('date'),
            'shift'           => $request->input('shift'),
            'patient_name'      => $request->input('patient_name'),
            'personal_care'         => $request->input('personal_care'),
            'medication_admin'    => $request->input('medication_admin'),
            'appointments'         => $request->input('appointments'),
            'activities'         => $request->input('activities'),
            'incident'  => $request->input('incident'),
           
        ]);
    
       
        $dailyEntry->save();
       
        return redirect('staff/viewentryrecords/')->withSuccess('Record added Successfully');
    }

     //Manage Hospital Passport
     public function addPassport(){
        $houses = Houses::all();
        $patients = Patients::all();
        $carers = User::all()->where('type','=','Staff');
        return view('staff.getHospitalPassport',compact('houses','carers','patients'));
    }

    public function viewPassport(){
        $health_passports  = DailyEntry::all();
        return view('staff.allPassports', compact('passports'));
    }

    public function storePassport(Request $request){

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'shift' => 'required',
            'patient_name' => 'required',
            'personal_care' => 'required',
            'medication_admin' => 'required', 
            'activities' => 'required', 
            'incident' => 'required',

           
        ],
            [
                'date.required'  => 'Username is required.',
                'shift.required' => 'User email is required',
                'patient_name.required' => 'User name is required',
                'personal_care.required' => 'User address is required',
                'medication_admin' => 'required|max:255',
                'activities' => 'required|string|max:255',
                'incident' => 'required|max:255',
               
            ]
        );

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
       
        $dailyEntry = DailyEntry::create([
            'date'    => $request->input('date'),
            'shift'           => $request->input('shift'),
            'patient_name'      => $request->input('patient_name'),
            'personal_care'         => $request->input('personal_care'),
            'medication_admin'    => $request->input('medication_admin'),
            'appointments'         => $request->input('appointments'),
            'activities'         => $request->input('activities'),
            'incident'  => $request->input('incident'),
           
        ]);
    
       
        $dailyEntry->save();
        return redirect('staff/viewentryrecords/')->withSuccess('Record added Successfully');
    }

    //Manage Hospital Passport
    public function addIncReport(){
        $houses = Houses::all();
        $patients = Patients::all();
        $carers = User::all()->where('type','=','Staff');
        return view('staff.getIncidentReport',compact('houses','carers','patients'));
    }

    public function viewIncReport(){
        $incident_reports  = DailyEntry::all();
        return view('staff.allIncidentReports', compact('incident_reports'));
    }

    public function storeIncReport(Request $request){

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'shift' => 'required',
            'patient_name' => 'required',
            'personal_care' => 'required',
            'medication_admin' => 'required', 
            'activities' => 'required', 
            'incident' => 'required',

           
        ],
            [
                'date.required'  => 'Username is required.',
                'shift.required' => 'User email is required',
                'patient_name.required' => 'User name is required',
                'personal_care.required' => 'User address is required',
                'medication_admin' => 'required|max:255',
                'activities' => 'required|string|max:255',
                'incident' => 'required|max:255',
               
            ]
        );

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
       
        $dailyEntry = DailyEntry::create([
            'date'    => $request->input('date'),
            'shift'           => $request->input('shift'),
            'patient_name'      => $request->input('patient_name'),
            'personal_care'         => $request->input('personal_care'),
            'medication_admin'    => $request->input('medication_admin'),
            'appointments'         => $request->input('appointments'),
            'activities'         => $request->input('activities'),
            'incident'  => $request->input('incident'),
           
        ]);
    
       
        $dailyEntry->save();
        return redirect('staff/viewentryrecords/')->withSuccess('Record added Successfully');
    }


     //Manage Hospital Passport
     public function addRiskAssement(){
        $houses = Houses::all();
        $patients = Patients::all();
        $carers = User::all()->where('type','=','Staff');
        return view('staff.getOperationsRiskAssessment',compact('houses','carers','patients'));
    }

    public function viewRiskAssessment(){
        $health_passports  = DailyEntry::all();
        return view('staff.allOperationRiskAssessments', compact('health_passports'));
    }

    public function storeRiskAssessment(Request $request){

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'shift' => 'required',
            'patient_name' => 'required',
            'personal_care' => 'required',
            'medication_admin' => 'required', 
            'activities' => 'required', 
            'incident' => 'required',

           
        ],
            [
                'date.required'  => 'Username is required.',
                'shift.required' => 'User email is required',
                'patient_name.required' => 'User name is required',
                'personal_care.required' => 'User address is required',
                'medication_admin' => 'required|max:255',
                'activities' => 'required|string|max:255',
                'incident' => 'required|max:255',
               
            ]
        );

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
       
        $dailyEntry = DailyEntry::create([
            'date'    => $request->input('date'),
            'shift'           => $request->input('shift'),
            'patient_name'      => $request->input('patient_name'),
            'personal_care'         => $request->input('personal_care'),
            'medication_admin'    => $request->input('medication_admin'),
            'appointments'         => $request->input('appointments'),
            'activities'         => $request->input('activities'),
            'incident'  => $request->input('incident'), 
        ]);
    
       
        $dailyEntry->save();
        return redirect('staff/viewriskassessments/')->withSuccess('Record added Successfully');
    }

    //Manage Support Plan
    public function addSupportPlan(){
        $houses = Houses::all();
        $patients = Patients::all();
        $carers = User::all()->where('type','=','Staff');
        return view('staff.getMySupportPlan',compact('houses','carers','patients'));
    }

    public function viewSupportPlan(){
        $incident_reports  = DailyEntry::all();
        return view('staff.allSupportPlans', compact('incident_reports'));
    }

    public function storeSupportPlan(Request $request){

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'shift' => 'required',
            'patient_name' => 'required',
            'personal_care' => 'required',
            'medication_admin' => 'required', 
            'activities' => 'required', 
            'incident' => 'required',
           
        ],
            [
                'date.required'  => 'Username is required.',
                'shift.required' => 'User email is required',
                'patient_name.required' => 'User name is required',
                'personal_care.required' => 'User address is required',
                'medication_admin' => 'required|max:255',
                'activities' => 'required|string|max:255',
                'incident' => 'required|max:255',
               
            ]
        );

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
       
        $dailyEntry = DailyEntry::create([
            'date'    => $request->input('date'),
            'shift'           => $request->input('shift'),
            'patient_name'      => $request->input('patient_name'),
            'personal_care'         => $request->input('personal_care'),
            'medication_admin'    => $request->input('medication_admin'),
            'appointments'         => $request->input('appointments'),
            'activities'         => $request->input('activities'),
            'incident'  => $request->input('incident'),
           
        ]);
    
       
        $dailyEntry->save();
        return redirect('staff/viewsupportplans/')->withSuccess('Record added Successfully');
    }

        //Manage Complaints
        public function addComplaint(){
            $houses = Houses::all();
            $patients = Patients::all();
            $carers = User::all()->where('type','=','Staff');
            return view('staff.getComplaintRecord',compact('houses','carers','patients'));
        }
    
        public function viewComplaints(){
            $incident_reports  = DailyEntry::all();
            return view('staff.allComplaintRecords', compact('incident_reports'));
        }
    
        public function storeComplaint(Request $request){
    
            $validator = Validator::make($request->all(), [
                'date' => 'required|date',
                'shift' => 'required',
                'patient_name' => 'required',
                'personal_care' => 'required',
                'medication_admin' => 'required', 
                'activities' => 'required', 
                'incident' => 'required',
               
            ],
                [
                    'date.required'  => 'Username is required.',
                    'shift.required' => 'User email is required',
                    'patient_name.required' => 'User name is required',
                    'personal_care.required' => 'User address is required',
                    'medication_admin' => 'required|max:255',
                    'activities' => 'required|string|max:255',
                    'incident' => 'required|max:255',
                   
                ]
            );
    
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
           
            $dailyEntry = DailyEntry::create([
                'date'    => $request->input('date'),
                'shift'           => $request->input('shift'),
                'patient_name'      => $request->input('patient_name'),
                'personal_care'         => $request->input('personal_care'),
                'medication_admin'    => $request->input('medication_admin'),
                'appointments'         => $request->input('appointments'),
                'activities'         => $request->input('activities'),
                'incident'  => $request->input('incident'),
               
            ]);
        
           
            $dailyEntry->save();
            return redirect('staff/viewcomplaintrecord/')->withSuccess('Record added Successfully');
        }

                //Manage Statements
                public function addStatement(){
                    $houses = Houses::all();
                    $patients = Patients::all();
                    $carers = User::all()->where('type','=','Staff');
                    return view('staff.witnessStatemenr',compact('houses','carers','patients'));
                }
            
                public function viewStatement(){
                    $incident_reports  = DailyEntry::all();
                    return view('staff.getWitnessStatement', compact('incident_reports'));
                }
            
                public function storeStatement(Request $request){
            
                    $validator = Validator::make($request->all(), [
                        'date' => 'required|date',
                        'shift' => 'required',
                        'patient_name' => 'required',
                        'personal_care' => 'required',
                        'medication_admin' => 'required', 
                        'activities' => 'required', 
                        'incident' => 'required',
                       
                    ],
                        [
                            'date.required'  => 'Username is required.',
                            'shift.required' => 'User email is required',
                            'patient_name.required' => 'User name is required',
                            'personal_care.required' => 'User address is required',
                            'medication_admin' => 'required|max:255',
                            'activities' => 'required|string|max:255',
                            'incident' => 'required|max:255',
                           
                        ]
                    );
            
                    if ($validator->fails()) {
                        
                        return redirect()->back()->withErrors($validator)->withInput();
                    }
                    
                   
                    $dailyEntry = DailyEntry::create([
                        'date'    => $request->input('date'),
                        'shift'           => $request->input('shift'),
                        'patient_name'      => $request->input('patient_name'),
                        'personal_care'         => $request->input('personal_care'),
                        'medication_admin'    => $request->input('medication_admin'),
                        'appointments'         => $request->input('appointments'),
                        'activities'         => $request->input('activities'),
                        'incident'  => $request->input('incident'),
                       
                    ]);
                
                   
                    $dailyEntry->save();
                    return redirect('staff/viewcomplaintrecord/')->withSuccess('Record added Successfully');
                }



}
