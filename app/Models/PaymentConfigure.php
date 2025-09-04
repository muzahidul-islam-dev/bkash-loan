<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentConfigure extends Model
{
    protected $fillable = [
        'username',
        'password',
        'app_key',
        'secret_key',
    ];
}
