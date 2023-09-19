<?php

namespace App\Http\Controllers;

use App\Models\NewPatients;
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

    public function viewMyPatients()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }
}
