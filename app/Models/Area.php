<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Area extends Model
{
  use HasFactory;
  
  public $timestamps = false;

  public function cities()
  {
    return $this->hasMany('App\Models\City');
  }
  
  public static function getAllArea()
  {
    $areas = self::get();
      return $areas;
    }
}
