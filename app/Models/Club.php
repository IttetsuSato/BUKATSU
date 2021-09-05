<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $guarded = [
      'id',
      'created_at',
      'updated_at',
    ];

    public function users()
    {
      return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    public static function getAllClubByName()
    {
      return self::orderBy('name', 'asc')->get();
    }

    public static function getAllClubOrderByAttribute()
    {
      return self::orderBy('attribute', 'desc')->orderby('name', 'asc')->get();
    }
}
