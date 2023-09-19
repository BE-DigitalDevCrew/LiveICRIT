<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyEntry extends Model
{
    use HasFactory;
    /**
    * The attributes that are mass assignable.
    *
    * @var array

    */
   protected $fillable = [
    'date',
    'shift',
    'patient_name',
    'personal_care' ,
    'medication_admin',
    'activities' ,
    'appointments' ,
    'incident',
   ];
 
   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array

    */
   protected $hidden = [
       'password',
       'remember_token',
   ];
 
   /**
    * The attributes that should be cast.
    *
    * @var array

    */
   protected $casts = [
       'email_verified_at' => 'datetime',
   ];

   /**
    * Interact with the user's first name.
    *
    * @param  string  $value
    * @return \Illuminate\Database\Eloquent\Casts\Attribute
    */
   

}
