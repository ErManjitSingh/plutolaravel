<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable =['country_id','state_id','district_id','city_id','location_site_id','title','image','status'];
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
  public function location_site(){
    return $this->belongsTo(Locationsite::class);
}
}
