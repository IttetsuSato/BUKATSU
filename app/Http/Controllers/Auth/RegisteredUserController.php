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

        return view('auth.register', [
          'clubs' => $clubs
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
            'birthday' => ['date'],
            'sex' => ['string'],
            'club' => ['string'],
            'year' => ['integer'],
            'area' => ['required','string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'katakana' => $request->katakana,
            'attribute' => $request->attribute,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'sex' => $request->sex,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
