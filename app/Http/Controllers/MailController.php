<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Mail\OfferMail;
use Mail;

class MailController extends Controller
{
      /**
   * メール確認
   *
   * @param  Request $request 入力値
   */
  public function confirm(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

    $result = [];

    if ($request->has(['name', 'email'])) {
      $result['name'] = $request->name;
      $result['email'] = $request->email;
    } else {
      return redirect('/index', $result);
    }

    return back()->with([
      'name' => $result['name'],
      'email' => $result['email'],
    ]);

  }

    /**
   * メール送信
   *
   * @param  Request $request 入力値
   */
  public function execute(Request $request)
  {

    if ($request->has(['name', 'email'])) {
      $name = $request->name;
      $email = $request->email;
    }else{
      return back()->with('result', 'この指導者はメールアドレスが利用できない可能性があります');
    }

    Mail::to($email)->send(new OfferMail($name));


    return back()->with('result', 'メールを送信しました！');
  }
}
