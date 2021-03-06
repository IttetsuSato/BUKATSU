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
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/mycrop.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> --}}
        <script src="https://kit.fontawesome.com/137e363532.js" crossorigin="anonymous" defer></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous" defer></script> --}}
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" defer></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" defer></script> --}}
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        {{-- <script src="{{ asset('js/mycrop.js') }}" defer></script> --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bukatsu-font antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            {{-- <!-- Page Heading -->
            <header class="bukatsu-bg-skyblue shadow">
                <div class="mx-auto py-2 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <div class="footer">
              <div class="bukatsu-bg-blue py-6 px-4 sm:px-6 lg:px-8">
                <div class="mx-auto bukatsu-text-white">
                  <a href="{{ asset('storage/pdf/BUKATSU????????????.pdf') }}" target="_blank">
                    <p class="font-bold text-xl my-4">????????????</p>
                  </a>
                  <a href="{{ asset('storage/pdf/BUKATSU????????????.pdf') }}" target="_blank">
                    <p class="font-bold text-xl  my-4">????????????</p>
                  </a>
                  <a href="{{ asset('storage/pdf/BUKATSU??????????????????????????????.pdf') }}" target="_blank">
                    <p class="font-bold text-xl  my-4">??????????????????????????????</p>
                  </a>
                  {{-- <a href="#">
                    <p class="font-bold text-xl  my-4">????????????????????????????????????</p>
                  </a> --}}
                  {{-- <a href="#">
                    <p class="font-bold text-xl  my-4">FAQ</p>
                  </a> --}}
                </div>
                <div class="flex justify-between items-end">
                  <div class="flex bukatsu-text-white text-3xl">
                    <a href="https://www.facebook.com/Bukatsu-100271079092538" target="_blank">
                      <i class="m-2 fab fa-facebook-square"></i>
                    </a>
                  </div>
                  <a href="{{route('top')}}">
                    <img src="{{ asset('storage/default_image/logo.png') }}" width="230" alt="image">
                  </a>
                </div>
              </div>
              <div class="bukatsu-bg-white py-6 text-center">
                <p class="bukatsu-text-blue">Copyright ????? FORH All Rights Reseved.</p>
              </div>
            </div>
    </body>
</html>
