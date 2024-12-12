<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'customer_name',
        'car_name',
        'start_date',
        'end_date',
        'payment_status', // 'downpayment' or 'full_paid'
        'status', // 'pending', 'approved', 'rejected'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
