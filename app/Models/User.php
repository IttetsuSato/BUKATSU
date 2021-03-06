<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [
      'id',
      'created_at',
      'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification(){
      $this->notify(new \App\Notifications\CustomVerifyEmail());
    }

    public function clubs()
    {
      return $this->belongsToMany('App\Models\Club')->withTimestamps();
    }

    public function city()
    {
      return $this->belongsTo('App\Models\City');
    }

    public function updateProfileImage(Array $params)
    {
      if(isset($params['image'])){
        $file_name = $params['image']->store('public/image/');

        $this::where('id', $this->id)
            ->update([
              'image'    => basename($file_name),
            ]);
      }
      return;
    }

    public function updateProfile(Array $params)
    {
        $this::where('id', $this->id)
            ->update([
              'name'     => $params['name'],
              'katakana' => $params['katakana'],
              'profile'  => $params['profile'],
              'email'    => $params['email'],
            ]); 

        return;
    }

    public static function getUsers()
    {
      $users = self::orderBy('attribute', 'asc')->get();
      return $users;
    }

    public static function getNews($count)
    {
      $news = self::orderBy('created_at', 'desc')
      ->take($count)
      ->get();

        return $news;
    }
}
