<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbcReportsController;
use App\Http\Controllers\HousesController;




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
        Route::get('/dailyentry/pdf',[UserController::class,'pdfview'])->name('dailyentry.pdf');
        //Users
        Route::get('/admin/viewusers',[UserController::class,'viewUser'])->name('admin.viewusers');
        Route::get('/admin/approveusers',[UserController::class,'approveUser'])->name('admin.approveusers');
        Route::get('/admin/approvedusers',[UserController::class,'approvedUsers'])->name('admin.approvedusers');
        Route::get('/admin/addusers',[UserController::class,'addUser'])->name('admin.addusers');
        Route::post('/admin/addusers',[UserController::class,'storeUser'])->name('admin.addusers');  
        Route::get('/admin/staff',[UserController::class,'viewStaff'])->name('admin.staff');   
        Route::get('/users', [UserController::class,'index'])->name('admin.users.index');
        Route::get('/admin/addtostaff',[UserController::class,'addToClientStaff'])->name('admin.addtostaff');
        Route::post('/admin/addtostaff',[UserController::class,'storeToClientStaff'])->name('admin.addtostaff');
        Route::get('/admin/assignedstaff',[UserController::class,'storeToClientStaff'])->name('admin.assignedstaff');
        // Clients
        Route::get('/admin/viewclients',[UserController::class,'viewAdminPatients'])->name('admin.viewclients');
	    Route::get('/admin/addclient',[UserController::class,'addPatient'])->name('admin.addclient');
	    Route::post('/admin/addclient',[UserController::class,'storePatient'])->name('admin.addclient');
	    //Houses
	    Route::get('/admin/addhouse',[HousesController::class,'addhouse'])->name('admin.addhouse');
	    Route::get('/admin/viewhouses',[HousesController::class,'viewHouse'])->name('admin.viewhouses');
	    Route::post('/admin/addhouse',[HousesController::class,'storeHouse'])->name('admin.addhouse');
	   //EntryList
	   Route::get('/admin/dailyentries',[UserController::class,'viewEntryLists'])->name('admin.dailyentries');
       Route::get('/users/{user_id}/approve', [UserController::class,'approve'])->name('admin.users.approve');
       //View Support Plans
         Route::get('/admin/viewsupportplan', [UserController::class, 'viewAdminSupportPlan'])->name('admin.viewsupportplan');
    });
    Route::middleware(['auth', 'user-access:staff'])->group(function () {
        Route::get('/dailyentry/pdf',[UserController::class,'pdfview'])->name('dailyentry.pdf');
        Route::get('/staff/home', [HomeController::class, 'staffHome'])->name('staff.home');
        Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout');
        Route::get('/staff/viewusers', [SuperAdminController::class, 'viewStaff'])->name('staff.viewusers');
        Route::get('pdfview',array('as'=>'pdfview','uses'=>'UserController@pdfview'));
        //ManageStaffPatients
        Route::get('/staff/addpatient', [UserController::class, 'addPatient'])->name('staff.addpatient');
        Route::get('/staff/viewpatients', [UserController::class, 'viewPatients'])->name('staff.viewpatients');
        Route::post('/staff/addpatient', [UserController::class, 'storePatient'])->name('staff.addpatient');
        //ManageDailyEntries
        Route::get('/staff/addentryrecord', [UserController::class, 'addDailyEntry'])->name('staff.addentryrecord');
        Route::post('/staff/addentryrecord', [UserController::class, 'storeEntryRecord'])->name('staff.addentryrecord');
        Route::get('/staff/viewentryrecords', [UserController::class, 'viewEntryRecord'])->name('staff.viewentryrecords');
        Route::get('staff/view-record/{id}', [UserController::class, 'viewRecordById'])->name('staff.view-record')->middleware("auth");
         
        //Manage ABC Reports
         Route::get('/staff/addabcreport', [ABCReportsController::class, 'index'])->name('staff.addabcreport');
         Route::get('/staff/viewabcreports', [ABCReportsController::class, 'allAbcReports'])->name('staff.viewallabcreports');
         Route::post('/staff/addabcreport', [ABCReportsController::class, 'store'])->name('staff.addabcreport');
        
        //Manage Hospital Passports
        Route::get('/staff/addhospitalpassport', [UserController::class, 'addPassport'])->name('staff.addhospitalpassport');
        Route::post('/staff/addhospitalpassport', [UserController::class, 'storePassport'])->name('staff.addhospitalpassport');
        Route::get('/staff/viewhealthpassport', [UserController::class, 'viewPassport'])->name('staff.viewhealthpassport');

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

