<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewPatients extends Model
{
    protected $fillable = [
        'client_name',
        'dob',
        'house_name',
        'user_nat_id',
        'phone_number',
        'address',
        'prepared_by'
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
