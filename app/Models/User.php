<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['username', 'email', 'password'])]
#[Hidden(['password'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use HasApiTokens;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected static function booted(): void
    {
        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }

    public function businessLogs()
    {
        return $this->hasMany(BusinessLog::class);
    }
}
