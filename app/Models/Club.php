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

    
    public static function storeProfile(Array $params)
    {
        if (isset($params['image'])) {
            $file_name = $params['image']->store('public/image/');

            self::create([
                  'name' => $params['name'],
                  'attribute' => $params['attribute'],
                  'image' => basename($file_name),
                ]);
        } else {
            self::create([
                  'name' => $params['name'],
                  'attribute' => $params['attribute'],
                  'image' => '',
                ]); 
        }

        return;
    }
    public function updateProfile(Array $params)
    {
        if (isset($params['image'])) {
            $file_name = $params['image']->store('public/image/');

            $this::where('id', $this->id)
                ->update([
                  'name' => $params['name'],
                  'attribute' => $params['attribute'],
                  'image' => basename($file_name),
                ]);
        } else {
            $this::where('id', $this->id)
                ->update([
                  'name' => $params['name'],
                  'attribute' => $params['attribute'],
                ]); 
        }

        return;
    }

    public static function getAllClubByName()
    {
      return self::orderBy('name', 'asc')->get();
    }

    public static function getAllClubOrderByAttribute()
    {
      return self::with('users')->orderBy('attribute', 'desc')->orderby('name', 'asc')->get();
    }
}
