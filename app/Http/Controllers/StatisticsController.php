<?php

namespace App\Http\Controllers;

use App\Models\DailyEntry;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use ConsoleTVs\Charts\Facades\Charts;

class StatisticsController extends Controller
{
    //
    public function index(){

        $userId = Auth::user()->house;
        $numberOfPatientsInHouse = DB::select("SELECT COUNT(*) AS count FROM patients WHERE house = ?", [$userId]);        
        //get the daily entries from the database and return them to the view records view
        $entries = DailyEntry::leftJoin('patients', 'daily_entries.patient_id', '=', 'patients.id')
        ->leftJoin('users', 'daily_entries.user_id', '=', 'users.id')
        ->where('users.house', $userId)
        ->select(
            'users.username as user_name',
            'users.house as house',
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
        $lineChart = Charts::database($entries, 'line', 'highcharts')
         ->title('Daily Entry Trends')
         ->elementLabel('Total Entries')
         ->dimensions(500, 300)
         ->responsive(false)
         ->groupBy('date'); // Group the entries by date
        return view('pages.viewStatistics', compact('entries', 'lineChart'));
         //dd($entries); 
        //return view('pages.viewStatistics', compact('entries'))->with("name", Auth::user()->username)->with("house", $userId)->with("numberOfPatients",$numberOfPatientsInHouse);
    }
}
