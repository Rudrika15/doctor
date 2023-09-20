<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // function hospitalType(){
    //     return $this->hasMany(HospitalType::class,'id','hospitalTypeId');
    // }
    public function hospital(){
        return $this->hasOne(Hospital::class,'id','hospitalId');
    }
    public function user(){
        return $this->hasOne(User::class,'id','userId');
    }
    public function specialist(){
        return $this->hasOne(Specialist::class,'id','specialistId');
    }
    
}
