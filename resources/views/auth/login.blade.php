<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-lg bukatsu-text-darkblue leading-tight">
      {{ __('ログイン') }}
    </h2>
  </x-slot>
  <div class="sm:px-6 lg:px-8 pt-10 bukatsu-bg-white border-b border-gray-200">
    <div class="mt-4 text-center">
      <p class="bukatsu-text-blue font-semibold text-lg">部活と地域のスポーツ指導したい人を<br>つなぐアプリ</p>
    </div>
    <div class="mt-1 max-w-xl mx-auto">
      <img class="text-center mx-auto" src="{{ asset('storage/default_image/logo2.png') }}" alt="image">
    </div>
    <div class="max-w-2xl  mx-auto">
      <img class="text-center mx-auto" src="{{ asset('storage/default_image/two_mens_w.png') }}" alt="image">
    </div>

  </div>
  <x-auth-card>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Email Address -->
          <div>
              {{-- <x-label for="email" :value="__('メールアドレス')" /> --}}

              <x-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="メールアドレス" :value="old('email')" required autofocus />
          </div>

          <!-- Password -->
          <div class="mt-4">
              {{-- <x-label for="password" :value="__('パスワード')" /> --}}

              <x-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              placeholder="パスワード"
                              required autocomplete="current-password" />
          </div>

          <!-- Remember Me -->
          <div class="block mt-4">
              <label for="remember_me" class="inline-flex items-center">
                  <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                  <span class="ml-2 text-sm text-gray-600">{{ __('次回から入力を省略') }}</span>
              </label>
          </div>

          <div class="flex flex-col items-center justify-center my-8">
            <x-button class="mb-4">
                {{ __('ログイン') }}
            </x-button>
              @if (Route::has('password.request'))
                  <a class="hover:underline bukatsu-text-blue" href="{{ route('password.request') }}">
                      {{ __('パスワードをお忘れの方はこちら') }}
                  </a>
              @endif

          </div>
      </form>
  </x-auth-card>
</x-app-layout>
