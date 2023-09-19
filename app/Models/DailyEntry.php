<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyEntry extends Model
{
    use HasFactory; 
    protected $fillable = [
        'date',
        'patient_id',
        'date',
        'shift',
        'personal_care',
        'medication_admin',
        'appointments',
        'activities',
        'incident'
    ];

    //each and every daily entry belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //every daily entry belongs to a patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
