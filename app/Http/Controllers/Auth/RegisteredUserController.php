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
      return view('auth.register', [
        'areas' => $areas,
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
            'city_id' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birthday' => ['date'],
            'sex' => ['string'],
            'club' => ['string'],
            'year' => ['integer'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'katakana' => $request->katakana,
            'attribute' => $request->attribute,
            'city_id' => $request->city_id,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'sex' => $request->sex,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
