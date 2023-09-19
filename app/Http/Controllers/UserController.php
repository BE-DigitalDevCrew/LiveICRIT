<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\NewUserCreated;
use App\Models\Patients;
use App\Models\Houses;
use App\Models\DailyEntry;
use App\Models\MySupportPlan;
use Illuminate\Support\Facades\Validator;
use Str;
use Hash;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\IncidentReport;
use App\Models\HospitalPassport;
use App\Models\Patient;

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

    //returning users to the add patient view
    public function addPatient(){
        //$house = Auth::user()->house;
        // Get daily entries associated with the logged-in user
        // Define the raw SQL query
        //$query = "SELECT * FROM users";
        // Execute the raw SQL query with the user ID parameter
        //$users = DB::select($query); 
        //return view('staff.addPatients')->with('users', $users);
        //$houses = Houses::all();
        //$carers = User::all()->where('type','=','Staff');
        $house_name = Auth::user()->house_name;
        $users = DB::table('users')
        ->where('house_name', $house_name)
        ->get();
        return view('staff.addPatients')->with("users",$users);
    }

    public function viewPatients(){
        //$patients  = Patients::all();
        $house_name = Auth::user()->house_name;
        $patients = DB::table('patients')
        ->where('house', $house_name)
        ->get();
        return view('staff.viewMyPatients', compact('patients'));
    }

    public function storePatient(Request $request){
       
        //dd($request->all());
        $patient = new Patients([
            'patient_name' => $request->input('patient_name'),
            'house' => $request->input('house'),
            'id_number' => $request->input('id_number'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
        ]);
        // Get the staff member (user) who is saving the patient
        $user = User::findOrFail($request->input('Staff_Id'));
        // Associate the patient with the staff member
        $user->patients()->save($patient);
        return back()->with('success', 'Patient added successfully.');
      }
    //Manage Daily Entries 
    public function addDailyEntry(){

        $house = Auth::user()->house_name;
        //select all the patients from the table where the house is equal to the hous of the authenticated user
        $patients = DB::select('SELECT * FROM patients WHERE house = ?', [$house]);
        //collect all the patients from the database
        $patients = collect($patients);
        //return all the patients to the daily entry view where the house is equal to the authenticated users house
        return view('staff.dailyEntry')->with("patients",$patients);
    }

    public function viewEntryRecord(){
         //get the authenticated users house
         $house = Auth::user()->house_name;
         //select the number of patients database that are based on the users house eg hearten
         $numberOfPatientsInHouse = DB::select("SELECT COUNT(*) AS count FROM patients WHERE house = ?", [$house]);           
         //each and every daily entry is going to display a staff name, patient details and daily entry records. the three tables are daily entry, users and patients. the left join joins the three tables and displays the data in the dashboard....
         $entries = DailyEntry::leftJoin('patients', 'daily_entries.patient_id', '=', 'patients.id')
         ->leftJoin('users', 'daily_entries.user_id', '=', 'users.id')
         ->where('users.house_name', $house)
         ->select(
             'users.username as user_name',
             'users.house_name as house',
             'patients.patient_name',
             'daily_entries.date',
             'daily_entries.personal_care',
             'daily_entries.shift',
             'daily_entries.id',
             'daily_entries.medication_admin',
             'daily_entries.activities',
             'daily_entries.incident',
             'daily_entries.appointments'
         )
         ->orderBy('daily_entries.id', 'desc')
         ->paginate(5);  
         return view('staff.viewEntries', compact('entries'))->with("name", Auth::user()->username)->with("house", $house)->with("numberOfPatients",$numberOfPatientsInHouse);
        //$patients  = DailyEntry::all();
        //return view('staff.viewEntries', compact('patients'));
    }

    public function storeEntryRecord(Request $request){

        $request->validate([
            'date' => 'required|date',
            'shift' => 'required', // Add validation for shift
            'patient_id' => 'required|exists:patients,id',
            'personal_care' => 'required', // Add validation for personal_care
            'medication_admin' => 'required', // Add validation for medication_admin
            'appointments' => 'required', // Add validation for appointments
            'activities' => 'required', // Add validation for activities
            'incident' => 'required', // Add validation for incident
        ]);
        // Create the daily entry and associate it with the user and patient
        $dailyEntry = new DailyEntry([
            'date' => $request->date,
            'shift' => $request->shift, // Assign the shift value
            'patient_id' => $request->patient_id,
            'personal_care' => $request->personal_care, // Assign the personal_care value
            'medication_admin' => $request->medication_admin, // Assign the medication_admin value
            'appointments' => $request->appointments, // Assign the appointments value
            'activities' => $request->activities, // Assign the activities value
            'incident' => $request->incident, // Assign the incident value
        ]);
    
        //get the authenticated user from the database
        $user = Auth::user();
        //the user is associated with the daily entry. save a daily entry that is associated to the user
        $user->dailyEntries()->save($dailyEntry);
        //return back to the screen and use sweet alert to show that the data has been saved
        return back()->with('success', 'Daily Entry added successfully.');
        
        /*$validator = Validator::make($request->all(), [
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
       
        return redirect('staff/viewentryrecords/')->withSuccess('Record added Successfully');*/
    }

     //Manage Hospital Passport
     public function addPassport(){
        //$houses = Houses::all();
        //$patients = Patients::all();
        //$carers = User::all()->where('type','=','Staff');
        $house = Auth::user()->house_name;
        //select all the patients from the table where the house is equal to the hous of the authenticated user
        $patients = DB::select('SELECT * FROM patients WHERE house = ?', [$house]);
        //collect all the patients from the database
        $patients = collect($patients);
        //return all the patients to the daily entry view where the house is equal to the authenticated users house
        return view('staff.getHospitalPassport')->with("patients",$patients);
        //return view('staff.getHospitalPassport',compact('houses','carers','patients'));
    }

    public function viewPassport(){
        //$health_passports  = DailyEntry::all();
        $usersHouse = Auth::user()->house_name;
        $hospitalPassports = HospitalPassport::leftJoin('patients', 'hospital_passports.patient_id', '=', 'patients.id')
            ->leftJoin('users', 'hospital_passports.user_id', '=', 'users.id')
            ->where('users.house_name', $usersHouse)
            ->select(
                'users.username as user_name',
                'users.house_name as house',
                'patients.patient_name as patient_name',
                'hospital_passports.dob', // Fillable field
                'hospital_passports.likes_to_be_known', // Fillable field
                'hospital_passports.nhs_number',
                'hospital_passports.dob',
                'hospital_passports.address',
                'hospital_passports.city',
                'hospital_passports.county',
                'hospital_passports.country',
                'hospital_passports.phone_number',
                'hospital_passports.email',
                'hospital_passports.my_support_care_needs',
                'hospital_passports.my_carer_speaks',
                'hospital_passports.things_to_know',
                'hospital_passports.religious_needs',
                'hospital_passports.ethnicity',
                'hospital_passports.gp_name',
                'hospital_passports.gp_address',
                'hospital_passports.gp_city',
                'hospital_passports.gp_county',
                'hospital_passports.gp_other_services',
                'hospital_passports.gp_social_worker',
                'hospital_passports.gp_allergies',
                'hospital_passports.gp_medical_interventions',
                'hospital_passports.gp_cardio_vascular',
                'hospital_passports.gp_risk_of_chocking',
                'hospital_passports.gp_current_medication',
                'hospital_passports.gp_mymedicalhistory',
                'hospital_passports.gp_anxious',
                'hospital_passports.how_to_comm',
                'hospital_passports.how_i_medicate',
                'hospital_passports.how_you_know_pain',
                'hospital_passports.moving_around',
                'hospital_passports.person_care',
                'hospital_passports.seeing_hearing',
                'hospital_passports.how_i_eat',
                'hospital_passports.how_i_keep_safe',
                'hospital_passports.how_i_toilet',
                'hospital_passports.sleeping_pattern',
                'hospital_passports.likes',
                'hospital_passports.dislike',
                'hospital_passports.additional_info',
                // Fillable field
            )
            ->orderBy('hospital_passports.id', 'desc')
            ->paginate(5);
        return view("staff.viewAllHospitalPassports")->with("hospitalPassports",$hospitalPassports);
        //return view('staff.allPassports', compact('passports'));
    }


    public function viewRecordById($id)
    {
    
    $id = Auth::user()->id;
    $entry = DailyEntry::join('users', 'daily_entries.user_id', '=', 'users.id')
    ->join('patients', 'daily_entries.patient_id', '=', 'patients.id')
    ->select(
        'daily_entries.*', // Select all fields from the daily_entries table
        'users.username as user_name',
        'patients.patient_name'
    )
    ->where('daily_entries.id', $id)
    ->first();
    return view('pages.singleDailyEntry', ['entry' => $entry]);  
    
    }

    public function storePassport(Request $request){

        // Define the validation rules for all form fields
        $validatedData = $request->validate([
            'assessment_date' => 'required|date',
            'staff_email' => 'required|email',
            'patient_id' => 'required|exists:patients,id', // Make sure the patient_id exists in the patients table
            'likes_to_be_known' => 'required|string',
            'nhs_number' => 'required|string',
            'dob' => 'required|date',
            'address' => 'required|string',
            'city' => 'required|string',
            'county' => 'required|string',
            'country' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'my_support_care_needs' => 'required|string',
            'my_carer_speaks' => 'required|string',
            'things_to_know' => 'required|string',
            'religious_needs' => 'required|string',
            'ethnicity' => 'required|string',
            'gp_name' => 'required|string',
            'gp_address' => 'required|string',
            'gp_city' => 'required|string',
            'gp_county' => 'required|string',
            'gp_other_services' => 'required|string',
            'gp_social_worker' => 'required|string',
            'gp_allergies' => 'required|string',
            'gp_medical_interventions' => 'required|string',
            'gp_cardio_vascular' => 'required|string',
            'gp_risk_of_chocking' => 'required|string',
            'gp_current_medication' => 'required|string',
            'gp_mymedicalhistory' => 'required|string',
            'gp_anxious' => 'required|string',
            'how_to_comm' => 'required|string',
            'how_i_medicate' => 'required|string',
            'how_you_know_pain' => 'required|string',
            'moving_around' => 'required|string',
            'person_care' => 'required|string',
            'seeing_hearing' => 'required|string',
            'how_i_eat' => 'required|string',
            'how_i_keep_safe' => 'required|string',
            'how_i_toilet' => 'required|string',
            'sleeping_pattern' => 'required|string',
            'likes' => 'required|string',
            'dislike' => 'required|string',
            'additional_info' => 'required|string',
        ]);

         // Create a new Incident model instance and fill it with the form data
         $user = Auth::user();
         //Save the operation risk assessment
         // Create a new SeizureReport instance with validated data
         $user->hospitalPassports()->create($validatedData);
         // Create a new MedicationIncident instance and fill it with validated data
         // Save the MedicationIncident to the database
         // Optionally, you can redirect to a success page or return a response
         return back()->with('success', 'Hospital Passport Added');
        //return back to the screen and use sweet alert to show that the data has been save
    }

    //Manage Hospital Passport
    public function addIncReport(){
           //
           $house = Auth::user()->house_name;
           $query = "
                   select * from patients where house = :house
            ";
           $patients = DB::select($query, ['house' => $house]);
           //dd($patients);
           return view('staff.getIncidentReport')->with("patients",$patients);
        //$houses = Houses::all();
        //$patients = Patients::all();
        //$carers = User::all()->where('type','=','Staff');
        //return view('staff.getIncidentReport',compact('houses','carers','patients'));
    }

    public function viewIncReport(){

         // //get the authenticated users house
         $house = Auth::user()->house_name;
         //select the number of patients database that are based on the users house eg hearten
         $numberOfPatientsInHouse = DB::select("SELECT COUNT(*) AS count FROM patients WHERE house = ?", [$house]);          
         $entries = IncidentReport::leftJoin('patients', 'incident_reports.patient_id', '=', 'patients.id')
         ->leftJoin('users', 'incident_reports.user_id', '=', 'users.id')
         ->where('users.house_name', $house)
         ->select(
             'users.username as user_name',
             'patients.patient_name',
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
             'incident_reports.manager_on_call',
         )
         ->orderBy('incident_reports.id', 'desc')
         ->paginate(5);
        //$incident_reports  = DailyEntry::all();
        return view('staff.allIncidentReports', compact('entries'));
    }

    public function storeIncReport(Request $request){

        $incidentReport = new IncidentReport([
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
        ]);

        $user = Auth::user();
        //the user is associated with the daily entry. save a daily entry that is associated to the user
        $user->incidentReports()->save($incidentReport);
        //return back to the screen and use sweet alert to show that the data has been saved
        return back()->with('success', 'Incident Report Saved');   


        /*$validator = Validator::make($request->all(), [
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
        return redirect('staff/viewentryrecords/')->withSuccess('Record added Successfully');*/
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
            $house = Auth::user()->house_name;
            $query = "
                   select * from patients where house = :house
            ";
           $patients = DB::select($query, ['house' => $house]);
           //dd($patients);
           //return view('staff.getIncidentReport')->with("patients",$patients);
        return view('staff.getMySupportPlan')->with("patients",$patients);
    }

    public function viewSupportPlan(){
        $usersHouse = Auth::user()->house_name;
        $supportPlans = MySupportPlan::leftJoin('patients', 'my_support_plans.patient_id', '=', 'patients.id')
            ->leftJoin('users', 'my_support_plans.user_id', '=', 'users.id')
            ->where('users.house_name', $usersHouse)
            ->select(
                'users.username as user_name',
                'users.house_name as house',
                'patients.patient_name as patient_name',
                'my_support_plans.comm_skills', // Fillable field
                'my_support_plans.friend_fam', // Fillable field
                'my_support_plans.mobility_dexterity', // Fillable field
                'my_support_plans.routines_personal_care', // Fillable field
                'my_support_plans.needs', // Fillable field
                'my_support_plans.emotions', // Fillable field
                'my_support_plans.daily_living_skills', // Fillable field
                'my_support_plans.general_health_needs', // Fillable field
                'my_support_plans.medication_support', // Fillable field
                'my_support_plans.recreation_and_relation', // Fillable field
                'my_support_plans.eating_drinking_nutrition', // Fillable field
                'my_support_plans.psychological_support', // Fillable field
                'my_support_plans.finance', // Fillable field
                'my_support_plans.staff_email', // Fillable field
                'my_support_plans.created_at',
            )
            ->orderBy('my_support_plans.id', 'desc')
            ->paginate(5);
            return view('staff.allSupportPlans', compact('supportPlans'));

        //$incident_reports  = DailyEntry::all();
        //return view('staff.allSupportPlans', compact('incident_reports'));
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
        
        $supportPlan = new MySupportPlan();
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
        return back()->with('success', 'Support Plan Added Successfully.');
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
