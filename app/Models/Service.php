<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'price'
    ];

    public function service_values()
    {
        return $this->hasMany(ServiceValue::class, 'service_id', 'id');
    }
}
