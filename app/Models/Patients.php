<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    /*protected $fillable = [
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array

     */
    
     protected $fillable = [
        'patient_name',
        'house',
        'Staff_Id', // Corrected the case to match your database column.
        'id_number',
        'address',
        'phone_number',
        'email',
    ];

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
 public function user()
 {
    return $this->belongsTo(User::class);
 }

 public function patient()
{
    return $this->belongsTo(Patients::class);
 }

 public function dailyEntries()
 {
        return $this->hasMany(DailyEntry::class);
  }

  public function supportPlans()
    {
        return $this->hasMany(MySupportPlan::class);
    }

    public function hospitalPassports()
    {
        return $this->hasMany(HospitalPassport::class);
    }

    public function abcReports()
    {
        return $this->hasMany(abcReport::class);
    }

    public function positiveBehaviourSupport()
    {
        return $this->hasOne(PositiveBehaviourSupport::class);
    }

    public function seizureReports()
    {
        return $this->hasMany(SeizureReport::class);
    } 
}
