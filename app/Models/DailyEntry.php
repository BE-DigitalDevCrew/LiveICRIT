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
    'patient_name',
    'patient_id',
    'staff_id',
    'date',
    'shift',
    'personal_care',
    'medication_admin',
    'appointments',
    'activities',
    'incident',
    'comments',
    'prepared_by',
   ];

   public function user()
   {
       return $this->belongsTo(User::class);
   }

   //every daily entry belongs to a patient
   public function patient()
   {
       return $this->belongsTo(Patient::class);
   }
 
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
