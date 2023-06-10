<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    function hospitalType()
    {
        return $this->hasOne(HospitalType::class, 'id', 'hospitalTypeId');
    }
    function city()
    {
        return $this->belongsTo(City::class, 'cityId');
    }
    function user()
    {
        return $this->hasOne(User::class, 'id', 'userId');
    }

    function doctor()
    {
        return $this->hasMany(Doctor::class, 'hospitalId', 'id');
    }
}
