<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BehaviouralMonitorCharts extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date',
        'knownBehaviours',
        'totals',
        'time',
        'knownBehaviourReference',
        'comments',
        'injuries',
        'initials',
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
