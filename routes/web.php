<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;



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

        //Manage SupportPlans
        Route::get('/staff/addsupportplan', [UserController::class, 'addSupportPlan'])->name('staff.addsupportplan');
        Route::post('/staff/addsupportplan', [UserController::class, 'storeSupportPlan'])->name('staff.addsupportplan');
        Route::get('/staff/viewsupportplan', [UserController::class, 'viewSupportPlan'])->name('staff.viewsupportplan');

        //Manage RiskAssessments
        Route::get('/staff/addriskassessment', [UserController::class, 'addRiskAssement'])->name('staff.addriskassessment');
        Route::post('/staff/addriskassessment', [UserController::class, 'storeRiskAssessment'])->name('staff.addriskassessment');
        Route::get('/staff/viewriskassessment', [UserController::class, 'viewRiskAssessment'])->name('staff.viewriskassessment');

         //Manage Complaint Records
         Route::get('/staff/addcomplaintrecord', [UserController::class, 'addComplaint'])->name('staff.addcomplaintrecord');
         Route::post('/staff/addcomplaintrecord', [UserController::class, 'storeComplaint'])->name('staff.addcompaintrecord');
         Route::get('/staff/viewcomplaintrecord', [UserController::class, 'viewComplaints'])->name('staff.viewcomplaintrecord');

          //Manage Complaint Records
          Route::get('/staff/addwitnessstatement', [UserController::class, 'addStatement'])->name('staff.addwitnessstatement');
          Route::post('/staff/addwitnessstatement', [UserController::class, 'storeStatement'])->name('staff.addwitnessstatement');
          Route::get('/staff/viewwitness', [UserController::class, 'viewWitnesses'])->name('staff.viewwitness');
        Route::get('/logout',[HomeController::class,'logout'])->name('logout');
       
    });
});

