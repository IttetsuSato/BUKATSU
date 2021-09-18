<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Mail\OfferMail;

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
      'body' => 'max:500'
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

    $result = [];

    if ($request->has(['name', 'email', 'body'])) {
      $result['name'] = $request->name;
      $result['email'] = $request->email;
      $result['body'] = $request->body;
    } else {
      return redirect('/index', $result);
    }

    return back()->with([
      'name' => $result['name'],
      'email' => $result['email'],
      'body' => $result['body'],
    ]);

  }

    /**
   * メール送信
   *
   * @param  Request $request 入力値
   */
  public function execute(Request $request)
  {

    if ($request->has(['name', 'email', 'body'])) {
      $name = $request->name;
      $email = $request->email;
      $body = $request->body;
    }

    Mail::to($email)->send(new MailSend($name, $body));

    return back()->with('result', 'メールを送信しました！');
  }
}
