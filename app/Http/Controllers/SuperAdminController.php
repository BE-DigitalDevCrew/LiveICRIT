<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use App\Events\NewUserCreated;
use App\Models\NewPatients;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;

class SuperAdminController extends Controller
{
    /**
     * Manage general users
     */
   
    public function viewUsers()
    {  
        $users = User::all();
       return view('super_admin.viewusers' , compact('users'));
    }
     /**
     * End managing  general users
     */

     /**
     * Manage general users
     */
    public function addPatient()
    { 
        $users = User::all();
       return view('super_admin.addpatient', compact('users'));
    }

    public function viewPatient()
    {  
        $patients = NewPatients::all();
       return view('super_admin.viewpatients', compact('patients'));
    }

    public function storePatient(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'house_name' => 'required|email|max:255',
            'staff_id' => 'required|max:255',
      
           
        ],
            [
                'patient_name.required'  => 'Username is required.',
                'email.required' => 'User email is required',
                'house_name.required' => 'User email is required',
                'staff_id.required' => 'User house is required',
            ]
        );
        
    
        $user = NewPatients::create([
            'patient_name'    => $request->input('patient_name'),
            'email'       => $request->input('email'),
            'house_name'       => $request->input('house'),
            'staff_id'       => $request->input('staff_id'),
        ]);

       // dd($user);

        $user->save();
        return redirect('admin/viewpatients/');
    }
     /**
     * End managing  general users
     */

    public function addHouse()
    {
       return view('super_admin.addhouse');
    }
    public function viewHouse()
    {
       return view('super_admin.viewhouses');
    }

    
    public function addEntryList()
    {
       return view('super_admin.addentrylist');
    }
    
    public function viewEntryLists()
    {
       return view('super_admin.viewentrylists');
    }

   
    public function viewPartners()
    {
       return view('staff.viewpartners');
    }

    public function storeUser(Request $request)
    {
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

    public function readThisNotif(Request $request){
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function viewUser(){
        $users = User::all();
        return view('super_admin.viewusers' , compact('users'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuperAdmin $superAdmin)
    {
        //
    }
}
