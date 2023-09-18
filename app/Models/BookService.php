<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookService extends Model
{
    use HasFactory;

    protected $table = 'book_services';

    protected $fillable = [
        'user_id', 'service_id', 'servicelocation', 'serviceamount', 'service_date', 'service_timeslot', 'service_notes', 'payment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'servicelocation');
    }
}
