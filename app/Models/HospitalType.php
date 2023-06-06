<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalType extends Model
{
    use HasFactory;
    public function hospital(){
        return $this->hasMany(Hospital::class,'hospitalTypeId','id');
    }
    
}
