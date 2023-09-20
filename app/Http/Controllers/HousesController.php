<?php

namespace App\Http\Controllers;

use App\Models\Houses;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class HousesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function addHouse()
    {
        $houses = Houses::all();
       return view('super_admin.addhouse', compact('houses'));
    }
    public function viewHouse()
    {
        $houses = Houses::all();
        $total_lorraine = User::where('house_name', 'Lorraine')->first(['house_name']);
        $total_lorraine_users = User::where('house_name', 'Lorraine')->count();

        $total_hearten = User::where('house_name', 'Hearten')->first(['house_name']);
        $total_hearten_users = User::where('house_name', 'Hearten')->count();

        $total_oakdale = User::where('house_name', 'Oakdale')->first(['house_name']);
        $total_oakdale_users = User::where('house_name', 'Oakdale')->count();

        $total_wyresdale = User::where('house_name', 'Wyresdale')->first(['house_name']);
        $total_wyresdale_users = User::where('house_name', 'Wyresdale')->count();

        return view('super_admin.viewhouses', compact('total_lorraine','total_lorraine_users',
                                                      'total_hearten','total_hearten_users',
                                                      'total_oakdale','total_oakdale_users',
                                                      'total_wyresdale','total_wyresdale_users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeHouse(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'house_name' => 'required' ,
            'capacity'  =>  'required' ,
            'house_head'  => 'required',
      
           
        ],
            [
                'house_name.required'  => 'House name is required.',
                'capacity.required'    => 'House capacity is required',
                'house_head.required'  => 'House head is required',
               
            ]
        );
        
       
       
        $house = Houses::create([
            'house_name'    => $request->input('house_name'),
            'capacity'       => $request->input('capacity'),
            'house_head'       => $request->input('house_head'),
            'is_active'       => $request->input('status'),
        ]);

       

        $house->save();

        return redirect()->route('admin.viewhouses')->withSuccess('House added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Houses $houses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Houses $houses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Houses $houses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Houses $houses)
    {
        //
    }
}
