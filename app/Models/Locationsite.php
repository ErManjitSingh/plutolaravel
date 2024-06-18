<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locationsite extends Model
{
    use HasFactory;
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }
        public function city(){
        return $this->belongsTo(City::class);
    }
    public function location_site(){
        return $this->belongsTo(Locationsite::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

}
