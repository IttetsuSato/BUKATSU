<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Club;

class ClubController extends Controller
{

  public function search()
  {
    $clubs = Club::all();
    return view('search.club',compact('clubs'));
  }


  public function indexUserByClub($club_id)
  {
    $users = club::find($club_id)->users()->where('attribute', 'civilian')->get();
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
      $clubs = Club::getAllClubByName();
      return view('club.index', [
        'clubs' => $clubs
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // バリデーション
      $validator = Validator::make($request->all(), [
        'name' => 'required | max:191',
        'attribute' => 'required',
      ]);
      // バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('club.create')
          ->withInput()
          ->withErrors($validator);
      }
      // create()は最初から用意されている関数
      // 戻り値は挿入されたレコードの情報
      $result = Club::create($request->all());
      return redirect()->route('club.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $club = Club::find($id);
      return view('club.edit', ['club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //バリデーション
      $validator = Validator::make($request->all(), [
        'name' => 'required | max:191',
        'attribute' => 'required',
      ]);
      //バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('club.edit', $id)
          ->withInput()
          ->withErrors($validator);
      }
      //データ更新処理
      // updateは更新する情報がなくても更新が走る（updated_atが更新される）
      $result = Club::find($id)->update($request->all());
      return redirect()->route('club.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result = Club::find($id)->delete();
      return redirect()->route('club.index');
    }
}
