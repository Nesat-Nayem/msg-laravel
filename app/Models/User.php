<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'contactno',
        'profileimage',
        'email_verified_at',
        'password',
        'confirmpassword',
        'countrycode',
        'dob',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'postalcode',
        'user_wallet',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function type(): Attribute
    {
        return new Attribute(
            /* Users: 0=>Admin, 1=>Manager, 2=>User */
            // get: fn ($value) => ["admin", "manager", "user"][$value],
        );
    }
}
