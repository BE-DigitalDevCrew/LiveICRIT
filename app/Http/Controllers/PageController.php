<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }
        return abort(404);
    }

    public function vr()
    {
        $house = Auth::user()->house;
        $patients = Patient::all();
        //$users = User::all();
        $users = DB::select("SELECT * FROM users WHERE house = ?", [$house]);
        return view("pages.virtual-reality")->with("patients",$patients)->with("users",$users);
    }

    public function rtl()
    {
        return view("pages.rtl");
    }

    public function profile()
    {
        
    }

    public function signin()
    {
        return view("pages.sign-in-static");
    }

    public function signup()
    {
        return view("pages.sign-up-static");
    }
}
