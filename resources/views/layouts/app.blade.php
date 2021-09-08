<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BUKATSU') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/137e363532.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bukatsu-font antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bukatsu-bg-skyblue shadow">
                <div class="mx-auto py-2 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <div class="footer">
              <div class="bukatsu-bg-blue py-6 px-4 sm:px-6 lg:px-8">
                <div class="mx-auto bukatsu-text-white">
                  <a href="#">
                    <p class="font-bold text-xl my-4">会社案内</p>
                  </a>
                  <a href="#">
                    <p class="font-bold text-xl  my-4">利用規約</p>
                  </a>
                  <a href="#">
                    <p class="font-bold text-xl  my-4">プライバシーポリシー</p>
                  </a>
                  <a href="#">
                    <p class="font-bold text-xl  my-4">特定商取引法に基づく表示</p>
                  </a>
                  <a href="#">
                    <p class="font-bold text-xl  my-4">FAQ</p>
                  </a>
                </div>
                <div class="flex justify-between items-end">
                  <div class="flex bukatsu-text-white text-3xl">
                    <a href="#">
                      <i class="m-2 fab fa-facebook-square"></i>
                    </a>
                    <a href="#">
                      <i class="m-2 fab fa-instagram"></i>
                    </a>
                    <a href="#">
                      <i class="m-2 fab fa-twitter-square"></i>
                    </a>
                  </div>
                  <a href="{{route('top')}}">
                    <img src="{{ asset('storage/default_image/logo.png') }}" width="230" alt="image">
                  </a>
                </div>
              </div>
              <div class="bukatsu-bg-white py-6 text-center">
                <p class="bukatsu-text-blue">Copyright ©︎ FORH All Rights Reseved.</p>
              </div>
            </div>
    </body>
</html>
