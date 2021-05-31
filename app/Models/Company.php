<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function companies()
    {
        return $this->hasOne(City::class,'id','city_id');
    }
    public function relCountry()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }

    public function relState()
    {
        return $this->hasOne(State::class,'id','state_id');
    }
    public function relCity()
    {
        return $this->hasOne(City::class,'id','city_id');
    }
}
