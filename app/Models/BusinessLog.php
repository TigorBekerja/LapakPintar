<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['user_id', 'start_date', 'end_date', 'sales', 'latitude', 'longitude'])]

class BusinessLog extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function businessTypes()
    {
        return $this->belongsToMany(BusinessType::class, 'business_log_business_type');
    }
}
