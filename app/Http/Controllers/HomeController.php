<?php

namespace App\Http\Controllers;

use App\Models\DailyEntry;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('super_admin.home');
    }

    public function adminHome(): View
    {
        $total_users = DB::table('users')->count();
        $staff = DB::table('users')->where('type', '=','Staff');
        $total_staff = DB::table('users')->where('type', '=','Staff')->count();
        $total_houses = DB::table('houses')->count();
        $total_daily_entries = DB::table('daily_entries')->count();
        $total_patients = DB::table('patients')->count();
        // $total_carestaff = DB::table('jobs')->where('job_name', '=','CARE STAFF')->count();
        // $total_health_care_assistants = DB::table('jobs')->where('job_name', '=','HEALTH CARE ASSISTANTS')->count();
        // $total_therapists = DB::table('jobs')->where('job_name', '=','THERAPIST')->count();
        // $total_mental_health = DB::table('jobs')->where('job_name', '=','MENTAL HEALTH NURSES')->count();
        // $total_registered_nurses = DB::table('jobs')->where('job_name', '=','REGISTERED GENERAL NURSE')->count();
        // $total_midwives = DB::table('jobs')->where('job_name', '=','MIDWIVES')->count();
        // $total_categories = Categories::all()->count();
        $entries =  DailyEntry::all();
        return view('super_admin.home',compact('entries','total_users','staff','total_staff','total_houses','total_daily_entries','total_patients'));

    } 

    public function staffHome(): View
    {
        $entries =  DailyEntry::all();
        return view('staff.home',compact('entries'));
    }

    public function approval()
{
    return view('approval');
}

public function logout(Request $request)
{

    if(Auth::guard('admin')->check()) // this means that the admin was logged in.
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }

    $this->guard('')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    if ($response = $this->loggedOut($request)) {
        return $response;
    }

    return $request->wantsJson()
        ? new JsonResponse([], 204)
        : redirect('/login');
}

}
