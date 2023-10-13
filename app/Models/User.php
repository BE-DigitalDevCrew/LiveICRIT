<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'house_name',
        'type',
        'password',
        'is_email_verified',
        'admin', 
        'approved_at' 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
       public function dailyEntries()
    {
        return $this->hasMany(DailyEntry::class);
    }

       
    public function positiveBehaviourSupports()
    {
            return $this->hasMany(PositiveBehaviourSupportPlan::class);
    }

    public function patients()
    {
        return $this->hasMany(Patients::class, 'Staff_id'); // 'staff_id' should be the foreign key column name
    }

    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }
    // A support plan also belongs to a user (the creator)
   
    public function supportPlans(){

        return $this->hasMany(SupportPlans::class);
    }

    public function behaviouralCharts()
    {
        return $this->hasMany(BehaviouralMonitorCharts::class);
    }
    public function complaintsRecords()
    {
        return $this->hasMany(Complaints::class);
    }

    public function incidentReports()
    {
        return $this->hasMany(IncidentReports::class);
    }

    public function selfCertifications()
    {
        return $this->hasMany(SelfSertification::class);
    }

    public function hospitalPassports()
    {
        return $this->hasMany(HospitalPassport::class);
    }

    public function operationRiskAssessments()
{
    return $this->hasMany(OperationRiskAssessment::class);
}
    public function medicationIncidentReports()
{
    return $this->hasMany(MedicationIncident::class);
}

public function seizureReports()
{
    return $this->hasMany(SeizureReport::class);
}

public function fallsChecklists()
{
    return $this->hasMany(FallsCheklist::class);
}

public function witnessStatements()
{
    return $this->hasMany(WitnessStatements::class);
}

public function abcReports()
{
    return $this->hasMany(AbcReports::class);
}
}
