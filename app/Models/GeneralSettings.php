<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;

    protected $table = 'general_settings';

    protected $fillable = [
        'websitename',
        'contactdetails',
        'mobilenumber',
        'language',
        'location_radius',
        'commission_percentage',
        'service_locationtype',
        'service_placeholder',
        'profile_placeholder',
        'logo',
        'favicon',
        'icon',
        'demo_access'
    ];
}
