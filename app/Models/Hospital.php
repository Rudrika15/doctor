<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    function hospitalType(){
        return $this->hasMany(HospitalType::class,'id','hospitalTypeId');
    }
    function city(){
        return $this->hasMany(City::class,'id','cityId');
    }
    function user(){
        return $this->hasOne(User::class,'id','userId');
    }

}
