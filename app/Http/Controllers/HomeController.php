<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $news = [];
    return view('welcome', [
      'news' => $news
    ]);
  }
}
