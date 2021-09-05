<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;



    public function area()
    {
      return $this->belongsTo('App\Models\Area');
    }

    public static function getAllCity()
    {
      $cities = self::get();
      $collection = collect($cities);
      $citiesGroup = $collection->groupBy('area_id');
        return $citiesGroup;
      }
}
