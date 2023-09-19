<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewPatients extends Model
{
    protected $fillable = [
        'patient_name',
        'email',
        'house_name',
        'staff_id',
        'user_id',
        'phone_number',
        'address',
    ];

 public function user()
 {
    return $this->belongsTo(User::class);
  }

  public function dailyEntries()
  {
        return $this->hasMany(DailyEntry::class);
  }

  public function supportPlans()
  {
        return $this->hasMany(MySupportPlan::class);
  }
}
