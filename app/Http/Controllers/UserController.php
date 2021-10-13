<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Club;

class UserController extends Controller
{

  // 部活選択画面を表示
  public function registerClubsCreate(){
    $clubs = Club::getAllClubOrderByAttribute();

    return view('user.registerClubs',compact('clubs'));
  }

  // ブカツの配列をすべて登録
  public function registerClubsUpdate(Request $request, $user_id){
    if(isset($request)){
      if(is_array($request->all())){
        $clubs = $request->all();
      }
    }
    $user = User::find($user_id);
    foreach($clubs["club_id"] as $club_id){
      $user->clubs()->syncWithoutDetaching($club_id);
    }
    return redirect('myPage');
  }


  public function indexByCity($city_id)
  {
    $users = User::where('city_id', $city_id)->where('attribute', 'civilian')->orderBy('updated_at', 'desc')->get();
    return view('user.index',[
      'users' => $users
    ]);
  }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::getUsers();
      return view('user.index', [
        'users' => $users
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::find($id);
      return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::find($id);
      // $clubs = $user->clubs
      return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateImage(Request $request, $id)
    {
      //データ更新処理
      User::find($id)->updateProfileImage($request->all());
      return back()->with('result','更新しました！');
    }
    
    public function update(Request $request, $id)
    {
      //バリデーション
      $validator = Validator::make($request->all(), [
        'name' => 'required | max:191',
        'katakana' => 'required | max:191',
        'image' => 'file | image | mimes:jpeg,png,jpg | max:2048',
        'profile' => 'max:500',
        'email' => 'required | max:191',
      ]);
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('user.edit', $id)
          ->withInput()
          ->withErrors($validator);
      }
      //データ更新処理
      // updateは更新する情報がなくても更新が走る（updated_atが更新される）
      User::find($id)->updateProfile($request->all());
      return back()->with('result','更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result = User::find($id)->delete();
      return redirect()->route('user.index');
    }
}
