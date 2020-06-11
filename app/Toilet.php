<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Toilet extends Model
{
    //
    protected $fillable = [
      'business_product_id', 'name', 'street', 'house_number', 'postal_code', 'city_name', 'main_city_name', 'promotional_region', 'lat', 'long', 'product_description', 'accessibility_description', 'is_active'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }
}
