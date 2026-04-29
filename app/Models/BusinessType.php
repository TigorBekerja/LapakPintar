<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['type'])]

class BusinessType extends Model
{
    use HasFactory;

    public function businessLogs()
    {
        return $this->belongsToMany(BusinessLog::class, 'business_log_business_type');
    }
}
