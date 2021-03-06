<x-app-layout>
  <div class="sm:px-6 lg:px-8 pt-10 bukatsu-bg-white border-b border-gray-200">
    <div class="mt-4 text-center">
      <p class="bukatsu-text-blue font-semibold text-lg md:text-2xl tracking-wide">
        BUKATSUは<br>
        学校の部活と地域の<br>
        スポーツ、文化系を指導したい人を<br>
        つなぐプラットフォームです
      </p>
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
              <x-label for="email" :value="__('メールアドレス')" />

              <x-input id="email" class="block w-full" type="email" name="email"  :value="old('email')" required autofocus />
          </div>

          <!-- Password -->
          <div>
              <x-label for="password" :value="__('パスワード')" />

              <x-input id="password" class="block w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
          </div>

          <!-- Remember Me -->
          <div class="block mt-4">
              <label for="remember_me" class="inline-flex items-center ml-4">
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
