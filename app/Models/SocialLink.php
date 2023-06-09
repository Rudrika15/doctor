<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;
    public function hospital(){
        return $this->hasOne(Hospital::class,'id','hospitalId');
    }
}

