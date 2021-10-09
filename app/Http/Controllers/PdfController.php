<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PdfController extends Controller
{
  public function privacyPolicy()
  {
      $file_path = storage_path('app/pdf/BUKATSUプライバシーポリシー.pdf');
      // $headers = ['Content-disposition' => 'inline; filename="BUKATSUプライバシーポリシー.pdf"'];
      return response()->file($file_path);
      // 保存ファイル名の指定が不要なら headers 指定なしで OK
      // return response()->file($file_path);
  }
}