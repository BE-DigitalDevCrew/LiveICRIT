<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\NewUserCreated;
use App\Models\Patients;
use App\Models\Houses;
use App\Models\SupportPlans;
use App\Models\DailyEntry;
use App\Models\AbcReports;
use App\Models\NewPatients;
use App\Models\IncidentReports;
use Illuminate\Support\Facades\Validator;
use Str;
use Hash;
use Illuminate\Support\Facades\Auth;
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
        $users  = DB::select("SELECT * FROM `users` WHERE `approved_at` IS NULL ");
        return view('super_admin.viewusers', compact('users'));
    }

    public function viewStaff(){
        //$staff  = DB::select("SELECT * FROM `users` WHERE `type` = 'Staff'");
        $staff = User::where('type','=','Staff')->get();
       
        return view('super_admin.staff', compact('staff'));
    }

    public function viewEntryLists()
    {
        $entries = DailyEntry::
           leftJoin('patients', 'daily_entries.patient_id', '=', 'patients.id')
         ->leftJoin('users', 'daily_entries.user_id', '=', 'users.id')
         ->select(
             'users.username as user_name',
             'users.house_name as house',
             'patients.client_name',
             'daily_entries.date',
             'daily_entries.personal_care',
             'daily_entries.shift',
             'daily_entries.id',
             'daily_entries.medication_admin',
             'daily_entries.activities',
             'daily_entries.incident',
             'daily_entries.appointments',
             'daily_entries.comments'
         )
         ->orderBy('daily_entries.id', 'desc')
         ->paginate(5);
       return view('super_admin.viewentrylists',compact('entries'));
    }

    public function approveUser(){
        $users  = User::all();
        return view('super_admin.approveusers', compact('users'));
    }
    
   public function approvedUsers(){
        $users  = DB::select("SELECT * FROM `users` WHERE `approved_at` IS NOT NULL");
        return view('super_admin.approvedusers', compact('users'));
    }
    
     public function addToClientStaff(){
         $houses = Houses::all();
         $clients  = Patients::all();
         $users  =    DB::select("SELECT * FROM `users` WHERE `type` = 'Staff'");
         return view('super_admin.addtostaff', compact('clients','houses','users'));
    }

    public function storeToUserStaff(Request $request){
       
        $validator = Validator::make($request->all(), [
            'staff_name' => 'required|string|max:255',
            'staff_id' => 'required|string|max:255',
            'client_name' => 'required|email|max:255',
            'client_id' => 'required|email|max:255',
            'house_name' => 'required|max:255',
            
        ],
            [
                'staff_name.required'  => 'Staff name is required.',
                'staff_id.required'  => ' Staff ID  is required.',
                'client_name.required' => 'Client name is required',
                'client_id.required' => 'Client ID is required',
                'house_name.required' => 'House name is required', 
            ]
        );
        

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patient = Staff::create([
            'staff_name'    => $request->input('staff_name'),
            'staff_id'    => $request->input('staff_id'),
            'client_name'           => $request->input('client_name'),
            'client_id'      => $request->input('client_id'),
            'house_name'         => $request->input('house_name'),
            'prepared_by'     =>    Auth::user()->username,
           
        ]);
        

        $patient->save();

        return redirect('admin/viewclients/')->withSuccess('Client added Successfully');
    }

    public function viewUserToStaff(){
        $house_name = Auth::user()->house_name;
        $patients  = DB::table('staff')
        ->leftJoin('users', 'staff.user_id', '=', 'users.id')
        ->leftJoin('patients', 'staff.user_id', '=', 'patients.id')
          ->select(
                   'patients.client_name as client_name',
                   'daily_entries.date',
                   'daily_entries.shift', 
                   'daily_entries.patient_id',
                   'daily_entries.personal_care', 
                   'daily_entries.medication_admin', 
                   'daily_entries.appointments',
                   'daily_entries.activities',
                   'daily_entries.incident'
                )
         ->get();
         return view('super_admin.', compact('patients','houses'));

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
        $houses =  Houses::all();
        $users = DB::select("SELECT * FROM `users` WHERE `type` = 'Staff'");
        
        //dd($users);
        return view('super_admin.addclient',compact('houses','users'));
    }

  
    public function viewPatients(){
        
        $house  = Auth::user()->house_name;
        $patients = DB::select("SELECT * FROM `patients` WHERE `house_name` = ?", [$house]);
        return view('staff.viewMyPatients', compact('patients'));
    }
    
       public function viewAdminPatients(){
        
        $patients  = Patients::all();
        $houses  =   Houses::all();
        return view('super_admin.viewclients', compact('patients','houses'));
    }

     public function storePatient(Request $request){
        $staff_id   =  Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'client_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dob' => 'required',
            'house_name' => 'required|max:255',
            'user_nat_id' => 'required|string|max:255',
            'phone_number' => 'required|max:255',
            'address' =>  'required|string|max:255',
          
        ],
            [
                'client_name.required'  => 'Username is required.',
                'surname.required'  => ' User surname is required.',
                'dob.required' => 'User DOB is required',
                'house_name.required' => 'User house is required',
                'user_nat_id.required' => 'User ID is required',
                'address.required' => 'User address is required',
                'phone_number' => 'User phone number is required',
               
            ]
        );
    

        $patient = Patients::create([
            'client_name'    => $request->input('client_name'),
            'surname'    => $request->input('surname'),
            'dob'           => $request->input('dob'),
            'house_name'      => $request->input('house_name'),
            'address'         => $request->input('address'),
            'phone_number'    => $request->input('phone_number'),
            'user_nat_id'         => $request->input('user_nat_id'),
            'prepared_by'     =>    Auth::user()->username,
           
        ]);
        
       
        $patient->save();

        return redirect('admin/viewclients/')->withSuccess('Client added Successfully');
    }
    //Manage Daily Entries 
    public function addDailyEntry(){
        $houses = Houses::all();
        $patients = Patients::all();
        $carers = User::all()->where('type','=','Staff');
        return view('staff.dailyEntry',compact('houses','carers','patients'));
    }

    public function viewEntryRecord(){
        $house = Auth::user()->house_name;
         //select the number of patients database that are based on the users house eg hearten
         $numberOfPatientsInHouse = DB::select("SELECT COUNT(*) AS count FROM patients WHERE house_name = ?", [$house]);           
         //each and every daily entry is going to display a staff name, patient details and daily entry records. the three tables are daily entry, users and patients. the left join joins the three tables and displays the data in the dashboard....
         $entries = DailyEntry::
           leftJoin('patients', 'daily_entries.patient_id', '=', 'patients.id')
         ->leftJoin('users', 'daily_entries.staff_id', '=', 'users.id')
         ->where('users.house_name', $house)
         ->select(
             'users.username as user_name',
             'users.house_name as house',
             'patients.client_name',
             'daily_entries.date',
             'daily_entries.personal_care',
             'daily_entries.shift',
             'daily_entries.id',
             'daily_entries.medication_admin',
             'daily_entries.activities',
             'daily_entries.incident',
             'daily_entries.comments',
             'daily_entries.appointments'
         )
         ->orderBy('daily_entries.id', 'desc')
         ->paginate(5);  
         return view('staff.viewEntries', compact('entries'))->with("name", Auth::user()->username)->with("house", $house)->with("numberOfPatients",$numberOfPatientsInHouse);
        //$patients  = DailyEntry::all();
        //return view('staff.viewEntries', compact('patients'));
    }

     public function storeEntryRecord(Request $request){
        $user  = Auth::user()->username;

        $validator = Validator::make($request->all(), [
                'date' => 'required|date',
                'shift' => 'required', // Add validation for shift
                'patient_name' => 'required',
                'patient_id' => 'required',
                'personal_care' => 'required', // Add validation for personal_care
                'medication_admin' => 'required', // Add validation for medication_admin
                'appointments' => 'required', // Add validation for appointments
                'activities' => 'required', // Add validation for activities
                'incident' => 'required', // Add validation for incident 
               
                ],
                [
                    'date.required'  => 'Date is required.',
                    'shift.required'  => 'Shift is required.',
                    'patient_name.required' => 'Patient name is required',
                    'patient_id.required' => 'Patient ID is required',
                    'personal_care.required' => 'Personal care is required',
                    'medication_admin.required' => 'Medication admin is required',
                    'appointments.required' => 'Appointments are required',
                    'activities.required' => 'Activities are required',
                    'incident.required' => 'Incident is required', 
                  
                ]
            );

          
            
            $dailyEntry = DailyEntry::create([
                'date' => $request->date,
                   'shift' => $request->shift, // Assign the shift value
                   'patient_id' => $request->patient_id,
                   'staff_id' => Auth::user()->id,
                   'patient_name' => $request->patient_name,
                   'personal_care' => $request->personal_care, // Assign the personal_care value
                   'medication_admin' => $request->medication_admin, // Assign the medication_admin value
                   'appointments' => $request->appointments, // Assign the appointments value
                   'activities' => $request->activities, // Assign the activities value
                   'incident' => $request->incident, // Assign the incident value
                   'comments' => $request->comments, // Assign the incident value
                   'prepared_by' => $user
               
            ]);

           
               $dailyEntry->save();
               //return back to the screen and use sweet alert to show that the data has been saved
               return redirect('staff/viewentryrecords')->with('success', 'Daily Entry added successfully.');
    }
    
       public function viewRecordById($id)
    {
    
        $entry = DailyEntry::
          join('users', 'daily_entries.user_id', '=', 'users.id')
        ->join('patients', 'daily_entries.patient_id', '=', 'patients.id')
        ->select(
            'daily_entries.*', // Select all fields from the daily_entries table
            'users.username as user_name',
            'patients.client_name'
        )
        ->where('daily_entries.id', $id)
        ->first();
        return view('staff.singleDailyEntry', ['entry' => $entry]);  
   
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

    //Manage Incicence Reports
    public function addIncReport(){
        $user = Auth::user()->username;
        $houses = Auth::user()->house_name;
        $patients = DB::select("SELECT * FROM `patients` WHERE `house_name` = ? ",[$houses]);
        $carers = User::all()->where('type','=','Staff');
        return view('staff.getIncidentReport',compact('houses','carers','patients','user'));
    }

    public function viewIncReport(){
        $house = Auth::user()->house_name;
        //select the number of patients database that are based on the users house eg hearten
        $numberOfPatientsInHouse = DB::select("SELECT COUNT(*) AS count FROM patients WHERE house_name = ?", [$house]);          
        $incident_reports = IncidentReports::leftJoin('patients', 'incident_reports.patient_id', '=', 'patients.id')
        ->leftJoin('users', 'incident_reports.user_id', '=', 'users.id')
        ->where('users.house_name', $house)
        ->select(
            'users.username as user_name',
            'patients.client_name',
            'incident_reports.ref_number',
            'incident_reports.location',
            'incident_reports.date',
            'incident_reports.time',
            'incident_reports.person_affected',
            'incident_reports.initials',
            'incident_reports.description',
            'incident_reports.identified_causes',
            'incident_reports.completed_forms',
            'incident_reports.name_of_person',
            'incident_reports.date_completed',
            'incident_reports.manager_on_call'
        )
        ->orderBy('incident_reports.id', 'desc')
        ->paginate(5);
        return view('staff.allIncidentReports', compact('incident_reports'));
    }

    public function storeIncReport(Request $request){

        $validator = Validator::make($request->all(), [
            'patient_id' => 'required',
            'last_name' => 'required',
            'ref_number' => 'required',
            'location' => 'required',
            'date' => 'required', 
            'time' => 'required', 
            'person_affected' => 'required',
            'initials' => 'required',
            'description' => 'required',
            'identified_causes' => 'required',
            'completed_forms' => 'required',
            'name_of_person' => 'required', 
            'date_completed' => 'required', 
            'manager_on_call' => 'required',
           
        ]
            
        );

 
        $incidence_report = IncidentReports::create([
            'patient_id' => $request->patient_id,
            'last_name' => $request->last_name,
            'ref_number' => $request->ref_number,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'person_affected' => $request->person_affected,
            'initials' => $request->initials,
            'description' => $request->description,
            'identified_causes' => $request->identified_causes,
            'completed_forms' => $request->completed_forms,
            'name_of_person' => $request->name_of_person,
            'date_completed' => $request->date_completed,
            'manager_on_call' => $request->manager_on_call,
            'user_id' => Auth::user()->id
        ]);

    
    
        $user = Auth::user();
        //the user is associated with the daily entry. save a daily entry that is associated to the user
        $user->incidentReports()->save($incidence_report);
        return redirect('/staff/viewincidencereport')->withSuccess('Report added Successfully');
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
        $houses = Auth::user()->house_name;
        $staff_email = Auth::user()->email;
        $patients = DB::select("SELECT * FROM `patients` WHERE house_name = ?", [$houses]);
        $carers = User::all()->where('type','=','Staff');
        return view('staff.getMySupportPlan',compact('houses','carers','patients','staff_email'));
    }


    public function viewSupportPlan(){
        $house_name = Auth::user()->house_name;
        $support_plans  = DB::table('support_plans')
                         ->leftJoin('patients', 'support_plans.patient_id', '=', 'patients.id')
                          ->leftJoin('users', 'support_plans.user_id', '=', 'users.id')
                          ->where('users.house_name','=',$house_name)
                           ->select(
                                    'users.username as username',
                                    'users.house_name as house',
                                    'patients.client_name as patient_name',
                                    'support_plans.comm_skills', // Fillable field
                                    'support_plans.friend_fam', // Fillable field
                                    'support_plans.mobility_dexterity', // Fillable field
                                    'support_plans.routines_personal_care', // Fillable field
                                    'support_plans.needs', // Fillable field
                                    'support_plans.emotions', // Fillable field
                                    'support_plans.daily_living_skills', // Fillable field
                                    'support_plans.general_health_needs', // Fillable field
                                    'support_plans.medication_support', // Fillable field
                                    'support_plans.recreation_and_relation', // Fillable field
                                    'support_plans.eating_drinking_nutrition', // Fillable field
                                    'support_plans.psychological_support', // Fillable field
                                    'support_plans.finance', // Fillable field
                                    'support_plans.staff_email' // Fillable field
                                 )
                          ->get();
                          
        
        return view('staff.allSupportPlans', compact('support_plans'));
    }
    
    public  function viewAdminSupportPlan(){
        $house_name = Auth::user()->house_name;
       
        $supportPlans  = DB::table('support_plans')
                          ->leftJoin('patients', 'support_plans.patient_id', '=', 'patients.id')
                          ->leftJoin('users', 'support_plans.user_id', '=', 'users.id')
                          ->select(
                                    'users.username as username',
                                    'patients.client_name as patient_name',
                                    'support_plans.comm_skills', // Fillable field
                                    'support_plans.friend_fam', // Fillable field
                                    'support_plans.mobility_dexterity', // Fillable field
                                    'support_plans.routines_personal_care', // Fillable field
                                    'support_plans.needs', // Fillable field
                                    'support_plans.emotions', // Fillable field
                                    'support_plans.daily_living_skills', // Fillable field
                                    'support_plans.general_health_needs', // Fillable field
                                    'support_plans.medication_support', // Fillable field
                                    'support_plans.recreation_and_relation', // Fillable field
                                    'support_plans.eating_drinking_nutrition', // Fillable field
                                    'support_plans.psychological_support', // Fillable field
                                    'support_plans.finance', // Fillable field
                                    'support_plans.staff_email' // Fillable field
                                 )
                          ->get();
                          
     $support_plan_count =  $supportPlans->count();
     
     if($support_plan_count == 0){
          
          return('No records found');
         }
    
    else{
          return view('super_admin.view_support_plans', compact('supportPlans'));
        }
    }

    public function storeSupportPlan(Request $request){
        
        $validationRules = [
            'date' => 'required|date',
            'patient_id' => 'required|integer|min:1', // Adjust min value as needed
            'comm_skills' => 'required|integer',
            'friend_fam' => 'required|integer',
            'mobility_dexterity' => 'required|integer',
            'routines_personal_care' => 'required|integer',
            'needs' => 'required|integer',
            'emotions' => 'required|integer',
            'daily_living_skills' => 'required|integer',
            'general_health_needs' => 'required|integer',
            'medication_support' => 'required|integer',
            'recreation_and_relation' => 'required|integer',
            'eating_drinking_nutrition' => 'required|integer',
            'psychological_support' => 'required|integer',
            'finance' => 'required|integer',
            'staff_email' => 'required|email',
        ];
        
      
        
        $supportPlan = new SupportPlans();
        $supportPlan->date = request()->input('date');
        $supportPlan->patient_id = request()->input('patient_id');
        $supportPlan->comm_skills = request()->input('comm_skills');
        $supportPlan->friend_fam = request()->input('friend_fam');
        $supportPlan->mobility_dexterity = request()->input('mobility_dexterity');
        $supportPlan->routines_personal_care = request()->input('routines_personal_care');
        $supportPlan->needs = request()->input('needs');
        $supportPlan->emotions = request()->input('emotions');
        $supportPlan->daily_living_skills = request()->input('daily_living_skills');
        $supportPlan->general_health_needs = request()->input('general_health_needs');
        $supportPlan->medication_support = request()->input('medication_support');
        $supportPlan->recreation_and_relation = request()->input('recreation_and_relation');
        $supportPlan->eating_drinking_nutrition = request()->input('eating_drinking_nutrition');
        $supportPlan->psychological_support = request()->input('pSupport');
        $supportPlan->finance = request()->input('finance');
        $supportPlan->staff_email = request()->input('staff_email'); 
        
        $user = auth()->user();
        $user->supportPlans()->save($supportPlan);
    
        return redirect('staff/viewsupportplan/')->withSuccess('Record added Successfully');
    }

        //Manage Complaints
        public function addComplaint(){
            $houses = Auth::user()->house_name;
            $patients = DB::select("SELECT * FROM `patients` WHERE `house_name` =  $houses ")->get();
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
