<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PdfController extends Controller
{
  public function privacyPolicy()
  {
    $disk = 'local';  // or 's3'
    $storage = Storage::disk($disk);
    $file_name = 'BUKATSUプライバシーポリシー.pdf';
    $pdf_path = 'pdf/' . $file_name;
    $file = $storage->get($pdf_path);
    return response($file, 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="' . $file_name . '"');
  }
}