<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function hospital(){
        return $this->hasOne(Hospital::class,'id','hospitalId');
    }
    function  doctor(){
        return $this->hasOne(Doctor::class,'id','doctorId');
       
     }
   //   function  patient(){
   //      return $this->hasOne(Patient::class,'id','patientId');
       
   //   }
     function  schedule(){
        return $this->hasMany(Schedule::class,'id','scheduleId');
       
     }
     function  category(){
        return $this->hasOne(Category::class,'id','categoryId');
       
     }
     function  state(){
        return $this->hasOne(State::class,'id','stateId');
       
     }
     function  city(){
        return $this->hasOne(City::class,'id','cityId');
       
     }
}
