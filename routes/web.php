<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeizureReportController;
use App\Http\Controllers\ABCReportsController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\WitnessStatementController;
use App\Http\Controllers\BehaviouralMonitorChartsController;
use App\Http\Controllers\RiskAssessmentController;
use App\Http\Controllers\SelfCertificationSickFormController;
use App\Http\Controllers\OperationRiskAssessmentController;
use App\Http\Controllers\MedicationIncidentController;
use App\Http\Controllers\PositiveBehaviourSupportPlanController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('login', [AuthController::class, 'index'])->name('login'); 
Route::post('postlogin', [AuthController::class, 'postLogin'])->name('loginpost'); 
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('registerpost', [AuthController::class, 'postRegistration'])->name('registerpost'); 
  
/* New Added Routes */
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email'])->name('dashboard'); 
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 

Route::middleware(['auth'])->group(function () {
        Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
        Route::get('/approval', [HomeController::class,'approval'])->name('approval');
        Route::get('/home', [HomeController::class,'index'])->name('home');
        Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout');
      
        Route::middleware(['admin'])->group(function () {
        //Users
        Route::get('/admin/viewusers',[UserController::class,'viewUser'])->name('admin.viewusers');
        Route::get('/admin/addusers',[UserController::class,'addUser'])->name('admin.addusers');
        Route::post('/admin/addusers',[UserController::class,'storeUser'])->name('admin.addusers');    
        Route::get('/users', [UserController::class,'index'])->name('admin.users.index');
        //Patients
        Route::get('/admin/viewpatients',[SuperAdminController::class,'viewPatient'])->name('admin.viewpatients');
	    Route::get('/admin/addpatient',[SuperAdminController::class,'addPatient'])->name('admin.addpatient');
	    Route::post('/admin/viewpatients',[SuperAdminController::class,'storePatient'])->name('admin.addpatient');
	    //Housesstaff
	    Route::get('/admin/addhouse',[HousesController::class,'addhouse'])->name('admin.addhouse');
	    Route::get('/admin/viewhouses',[HousesController::class,'viewHouse'])->name('admin.viewhouses');
	    Route::post('/admin/addhouse',[HousesController::class,'storeHouse'])->name('admin.addhouse');
	   //EntryList
	   Route::get('/admin/addentrylist',[SuperAdminController::class,'addEntryList'])->name('admin.addentrylist');
	   Route::post('/admin/addentrylist',[SuperAdminController::class,'addEntryList'])->name('admin.addentrylist');
	   Route::get('/admin/viewentrylist',[SuperAdminController::class,'viewEntryLists'])->name('admin.viewentrylist');
       Route::get('/users/{user_id}/approve', [UserController::class,'approve'])->name('admin.users.approve');
    });    
    Route::middleware(['auth', 'user-access:staff'])->group(function () {
        Route::get('/staff/home', [HomeController::class, 'staffHome'])->name('staff.home');
        Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout');
        Route::get('/staff/viewusers', [SuperAdminController::class, 'viewStaff'])->name('staff.viewusers');
        //ManageStaffPatients
        Route::get('/staff/addpatient', [UserController::class, 'addPatient'])->name('staff.addpatient');
        Route::get('/staff/viewpatients', [UserController::class, 'viewPatients'])->name('staff.viewpatients');
        Route::post('/staff/addpatient', [UserController::class, 'storePatient'])->name('staff.addpatient');
        //ManageDailyEntries
        Route::get('/staff/addentryrecord', [UserController::class, 'addDailyEntry'])->name('staff.addentryrecord');
        Route::get('/viewRecord/{id}', [UserController::class, 'viewRecordById'])->name('viewRecord')->middleware("auth");
        Route::post('/staff/addentryrecord', [UserController::class, 'storeEntryRecord'])->name('staff.addentryrecord');
        Route::get('/staff/viewentryrecords', [UserController::class, 'viewEntryRecord'])->name('staff.viewentryrecords');
        //Manage Hospital Passports
        Route::get('/staff/addhospitalpassport', [UserController::class, 'addPassport'])->name('staff.addhospitalpassport');
        Route::post('/staff/addhospitalpassport', [UserController::class, 'storePassport'])->name('staff.addhospitalpassport');
        Route::get('/staff/viewhealthpassport', [UserController::class, 'viewPassport'])->name('staff.viewhealthpassport');
        Route::get('staff/view-record/{id}', [UserController::class, 'viewRecordById'])->name('staff.view-record')->middleware("auth");

         //Manage IncidenceReports
        Route::get('/staff/addincidencereport', [UserController::class, 'addIncReport'])->name('staff.addincidencereport');
        Route::post('/staff/addincidencereport', [UserController::class, 'storeIncReport'])->name('staff.addincidencereport');
        Route::get('/staff/viewincidencereport', [UserController::class, 'viewIncReport'])->name('staff.viewincidencereport');

       //manage behavioural monitor charts reports
        //route for abc report
	    Route::get('/staff/addbchart', [BehaviouralMonitorChartsController::class, 'index'])->name('staff.addbchart')->middleware('auth');
	    Route::get('/staff/allbcharts', [BehaviouralMonitorChartsController::class, 'allBehaviouralSupportPlans'])->name('staff.allbcharts')->middleware('auth');
	    Route::post('/staff/savebchart', [BehaviouralMonitorChartsController::class, 'store'])->name('staff.savebchart')->middleware('auth');

        //manage self certification reports
	    Route::get('/staff/selfcertification', [SelfCertificationSickFormController::class, 'index'])->name('staff.selfcert')->middleware('auth');
	    Route::get('/staff/allselfcert', [SelfCertificationSickFormController::class, 'allSelfCertificationSickForms'])->name('staff.allselfcert')->middleware('auth');
	    Route::post('/staff/selfcertification', [SelfCertificationSickFormController::class, 'store'])->name('staff.selfcert')->middleware('auth');

        //Manage SupportPlans
        Route::get('/staff/addsupportplan', [UserController::class, 'addSupportPlan'])->name('staff.addsupportplan');
        Route::post('/staff/addsupportplan', [UserController::class, 'storeSupportPlan'])->name('staff.addsupportplan');
        Route::get('/staff/viewsupportplan', [UserController::class, 'viewSupportPlan'])->name('staff.viewsupportplan');

        //Manage RiskAssessments                                      
        Route::get('/staff/addriskassessment', [RiskAssessmentController::class, 'index'])->name('staff.addriskassessment');
        Route::post('/staff/addriskassessment', [RiskAssessmentController::class, 'store'])->name('staff.addriskassessment');
        Route::get('/staff/viewriskassessment', [RiskAssessmentController::class, 'allRiskAssessment'])->name('staff.viewriskassessment');

         //Manage Complaint Records
         Route::get('/staff/addcomplaintrecord', [ComplaintsController::class, 'index'])->name('staff.addcomplaintrecord');
         Route::post('/staff/addcomplaintrecord', [ComplaintsController::class, 'store'])->name('staff.addcompaintrecord');
         Route::get('/staff/viewcomplaintrecord', [ComplaintsController::class, 'allComplaintRecords'])->name('staff.viewcomplaintrecord');

          //Manage Self Certification Sick Forms
          Route::get('/staff/addcomplaintrecord', [ComplaintsController::class, 'index'])->name('staff.addcomplaintrecord');
          Route::post('/staff/addcomplaintrecord', [ComplaintsController::class, 'store'])->name('staff.addcompaintrecord');
          Route::get('/staff/viewcomplaintrecord', [ComplaintsController::class, 'allComplaintRecords'])->name('staff.viewcomplaintrecord');

          //Manage Witness Statements
          Route::get('/staff/addwitnessstatement', [WitnessStatementController::class, 'index'])->name('staff.addwitnessstatement');
          Route::post('/staff/addwitnessstatement', [WitnessStatementController::class, 'store'])->name('staff.addwitnessstatement');
          Route::get('/staff/viewwitness', [WitnessStatementController::class, 'viewAllWitnessesStatements'])->name('staff.viewwitness');
          Route::get('/logout',[HomeController::class,'logout'])->name('logout');

        //manage seizure reports 
        Route::get('/staff/addseizurereport', [SeizureReportController::class, 'index'])->name('getSeizureReport')->middleware('auth');
	    Route::post('/staff/saveSeizureReport', [SeizureReportController::class, 'store'])->name('saveSeizureReport')->middleware('auth');
	    Route::get('staff/viewAllSeizureReports', [SeizureReportController::class, 'viewAllSeizureReports'])->name('viewAllSeizureReports')->middleware('auth');

        //manage abc reports
        //route for abc report
	    Route::get('/getAbcReport', [ABCReportsController::class, 'index'])->name('getAbcReport')->middleware('auth');
	    Route::get('/viewAllAbcReports', [ABCReportsController::class, 'allAbcReports'])->name('viewAllAbcReports')->middleware('auth');
	    Route::post('/saveAbcReport', [ABCReportsController::class, 'store'])->name('save-abcReport');

        //opearation risk assessment forms
        Route::get('/staff/addosriskassessment', [OperationRiskAssessmentController::class, 'index'])->name('staff.addosriskassess')->middleware('auth');
	    Route::get('/staff/viewallosriskassess', [OperationRiskAssessmentController::class, 'allOperationRiskAssessments'])->name('staff.viewallosriskassess')->middleware('auth');
	    Route::post('staff/submitosriskassessment', [OperationRiskAssessmentController::class, 'store'])->name('staff.submitosriskassessment');

          //medication incident report
          Route::get('/staff/addmedicationincident', [MedicationIncidentController::class, 'index'])->name('staff.addmedicationincident')->middleware('auth');
          Route::get('/staff/viewallmedicationincidents', [MedicationIncidentController::class, 'allMedicationInidentReports'])->name('staff.viewallmedicationincidents')->middleware('auth');
          Route::post('staff/submitmedicationincident', [MedicationIncidentController::class, 'store'])->name('staff.submitmedicationincident');


          //positive behaviour support plans
           Route::get('/staff/addpositivebehaviour', [PositiveBehaviourSupportPlanController::class, 'index'])->name('staff.addpositivebehaviour')->middleware('auth');
           Route::get('/staff/viewallpositivebehaviour', [PositiveBehaviourSupportPlanController::class, 'allPositiveBehaviourPlans'])->name('staff.viewallpositivebehaviour')->middleware('auth');
           Route::post('staff/submitpositivebehaviour', [PositiveBehaviourSupportPlanController::class, 'store'])->name('staff.submitpositivebehaviour');
   
    });
});

