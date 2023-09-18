<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Provider extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'provider';
    protected $guard = 'providerpanel';


    protected $fillable = [
        'subscription_id', 'name', 'mobilenumber', 'email', 'countrycode', 'password', 'confirmpassword', 'profileimage', 'dob', 'category_id', 'subcategory_id', 'country_id', 'state_id', 'city_id', 'address', 'postalcode', 'about', 'from_time', 'to_time', 'status'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
}
