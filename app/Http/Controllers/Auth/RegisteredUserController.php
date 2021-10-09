<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Club;
use App\Models\Area;
use App\Models\City;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

      $clubs = Club::getAllClubOrderByAttribute();
      $areas = Area::getAllArea();
      $citiesGroup = City::getAllCity();

        return view('auth.register', [
          'clubs' => $clubs,
          'areas' => $areas,
          'citiesGroup' => $citiesGroup,
          'attribute' => 'civilian'
        ]);
    }

    public function createSchool()
    {
      $areas = Area::getAllArea();
      $citiesGroup = City::getAllCity();
      return view('auth.register', [
        'areas' => $areas,
        'citiesGroup' => $citiesGroup,
        'attribute' => 'school'
      ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'katakana' => ['string', 'max:255'],
            'attribute' => ['required', 'string', 'max:32'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birth_year' => ['integer'],
            'birth_month' => ['integer'],
            'birth_day' => ['integer'],
            // 'tel1' => ['integer'],
            // 'tel2' => ['integer'],
            // 'tel3' => ['integer'],
            'sex' => ['string'],
            'phone' => ['integer', 'max:16'],
            'club_id' => ['string'],
            'career' => ['integer'],
        ]);

        if($request->birth_year && $request->birth_month && $request->birth_day){
          $birthday = $request->birth_year .'-'. $request->birth_month  .'-'. $request->birth_day;
        }else{
          $birthday = null;
        }

        if($request->tel1 && $request->tel2 && $request->tel3){
          $phone = $request->tel1 . $request->tel2 . $request->tel3;
        }else{
          $phone = null;
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'katakana' => $request->katakana,
            'attribute' => $request->attribute,
            'password' => Hash::make($request->password),
            'birthday' => $birthday,
            'sex' => $request->sex,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            // 'city' => $request->city,
            'city_id' => $request->city_id,
            'career' => $request->career,
            'transportation' => $request->transportation,
            'phone' => $phone,
            'final_education' => $request->final_education,
            'educated_from' => $request->educated_from,
        ]);

      // 中間テーブルへの保存
      $user->clubs()->sync($request->club_id);

        event(new Registered($user));

        Auth::login($user);

        if($request->attribute == 'school'){
          return redirect('registerClubs');
        }else{
          return redirect('myPage');
        }
    }
}
