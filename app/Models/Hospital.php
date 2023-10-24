<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'hospitalName' ,
            'slug' ,
            'email' ,
            'password' ,
            'address' ,
            'cityId' ,
            'contactNo' ,
            'hospitalTypeId' ,
            'siteUrl' ,
            'category' ,
            'hospitalLogo' ,
            'hospitalTime' ,
            'services'  
    ];

    public function generateSlug($value)
    {
        return Str::slug($value);
    }
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($hospital) {
            $hospital->slug = $hospital->generateSlug($hospital->hospitalName);
        });
    }

    function hospitalType()
    {
        return $this->hasOne(HospitalType::class, 'id', 'hospitalTypeId');
    }
    function city()
    {
        return $this->belongsTo(City::class, 'cityId');
    }
    function category()
    {
        return $this->hasOne(Category::class,'id','categoryId');
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
