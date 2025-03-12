<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'handyman_id',
        'client_id',
        'job_id',
        'booking_date',
        'status',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function handyman()
    {
        return $this->belongsTo(User::class, 'handyman_id');
    }
}
