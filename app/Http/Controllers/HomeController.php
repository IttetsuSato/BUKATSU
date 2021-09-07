<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
  public function index()
  {
    $news = User::getNews(4);
    return view('index',compact('news'));
  }
}
