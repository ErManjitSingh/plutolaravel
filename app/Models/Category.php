<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   use HasFactory;
   public function country(){
      return $this->belongsTo(Country::class);
  }
  public function state(){
      return $this->belongsTo(State::class);
  }   
  public function city(){
      return $this->belongsTo(City::class);
  }
  public function district(){
      return $this->belongsTo(District::class);
  }
  public function locationsite(){
    return $this->belongsTo(Locationsite::class);
}
}
