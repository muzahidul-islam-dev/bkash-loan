<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    
    protected $fillable = [
        'service_id',
        'phone_number',
        'amount',
        'payment_link'
    ];

    public function service(){
        return $this->hasOne(Service::class, 'id', 'service_id');
    }
}
