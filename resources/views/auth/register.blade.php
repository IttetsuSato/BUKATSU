<x-app-layout>

  <x-auth-card>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- 指導者用フォーム --}}
        @if($attribute === 'civilian')
          <!-- Name -->
          <div>
              <x-label for="name" :value="__('お名前（フルネーム）')" />
              <x-input id="name" class="block  w-full" type="text" name="name" placeholder="部活　太郎" :value="old('name')" required autofocus />
          </div>

          <!-- Name -->
          <div class="">
              <x-label for="katakana" :value="__('お名前（フリガナ）')" />
              <x-input id="katakana" class="block  w-full" type="text" name="katakana" placeholder="ブカツ　タロウ" :value="old('katakana')" required autofocus />
          </div>

          <!-- Attribute -->
          <div class=" hidden">
              <input type="text" name="attribute" id="attribute" value="{{ $attribute }}" >
          </div>

          <!-- Email Address -->
          <div class="">
              <x-label for="email" :value="__('メールアドレス')" />
              <x-input id="email" class="block  w-full" type="email" name="email" placeholder="bukatsu_test@gmail.com" :value="old('email')" required />
          </div>

          <!-- Password -->
          <div class="">
              <x-label for="password" :value="__('パスワード')" />
              <x-input id="password" class="block  w-full"
                              type="password"
                              placeholder="英数混在8文字以上"
                              name="password"
                              required autocomplete="new-password" />
          </div>

          <!-- Confirm Password -->
          <div class="">
              <x-label for="password_confirmation" :value="__('パスワードの確認')" />
              <x-input id="password_confirmation" class="block  w-full"
                              type="password"
                              placeholder="同じパスワードを入力"
                              name="password_confirmation" required />
          </div>

          <!-- Birthday -->
          <div class="">
            <x-label for="birthday"  :value="__('生年月日')" />
            <div class="py-3 px-3">
              <select class="border-gray-400 rounded-md" name="birth_year" id="birth_year" required autofocus :value="old('birth_year')"><option disabled>年を選択</option></select>
              <select class="border-gray-400 rounded-md mx-1" name="birth_month" id="birth_month" required autofocus :value="old('birth_month')"><option disabled>月を選択</option></select>
              <select class="border-gray-400 rounded-md" name="birth_day" id="birth_day" required autofocus :value="old('birth_day')"><option disabled>日を選択</option></select>
            </div>
          </div>

          <!-- 性別 -->
          <div class="">
            <x-label for="sex" :value="__('性別')" />
            <div id="sex"  class="text-lg leading-6 px-5 py-4">
              <div class="mx-2 inline">
                <label for="man">男性</label>
                <input id="man" type="radio" name="sex" value="man" required autofocus />
              </div>
              <div class="mx-2 inline">
                <label for="woman">女性</label>
                <input id="woman"  type="radio" name="sex" value="woman" required autofocus />
              </div>
            </div>
          </div>

          <!-- 指導種目 -->
          <div class="">
            <x-label for="club" :value="__('指導種目')" />
            <select class="border text-lg leading-8  py-2 px-5 pr-8 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="club_id" id="club" required autofocus>
              <option disabled selected value> -- 種目を選択 -- </option>
              @foreach($clubs as $club)
              <option value="{{ $club->id }}">{{ $club->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- 指導年数 -->
          <div class="">
            <x-label for="career" :value="__('指導歴（年）')" />
            <select class="border text-lg leading-8  py-2 px-5 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="career" id="career" required autofocus>
            </select>
          </div>

          <!-- エリア -->
          <div class="">
            <x-label for="area" :value="__('エリア')" />
            <select class="border text-lg leading-8  py-2 px-5 pr-8 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="area" id="area" required autofocus>
              <option disabled selected value> -- 地域を選択 -- </option>

              @foreach($areas as $area)
              <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- 市町村 -->
          <div class="">
            <x-label for="city" :value="__('市町村')" />
            <select class="border text-lg leading-8  py-2 px-5 pr-8 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="city_id" id="city"required autofocus>
              <option disabled selected value> -- 市町村を選択 -- </option>
              @foreach($citiesGroup as $key => $cities)
              <optgroup id="citiesGroup{{ $key }}" class="hidden">
                  @foreach($cities as $city)
                  <option value="{{ $city->id }}">{{ $city->name }}</option>
                  @endforeach
              </optgroup>
              @endforeach
            </select>
          </div>
        @endif
        {{-- 指導者用フォームここまで --}}

        {{-- 学校用フォーム --}}
        @if($attribute === 'school')

              <!-- Name -->
              <div>
                  <x-label for="name" :value="__('学校名')" />
                  <x-input id="name" class="block  w-full" type="text" name="name" placeholder="部活高校" :value="old('name')" required autofocus />
              </div>
  
              <!-- Attribute -->
              <div class=" hidden">
                  <input type="text" name="attribute" id="attribute" value="{{ $attribute }}" >
              </div>
  
              <!-- Email Address -->
              <div class="">
                  <x-label for="email" :value="__('メールアドレス')" />
  
                  <x-input id="email" class="block  w-full" type="email" name="email"  placeholder="bukatsu_test@gmail.com" :value="old('email')" required />
              </div>
  
              <!-- Password -->
              <div class="">
                  <x-label for="password" :value="__('パスワード')" />
  
                  <x-input id="password" class="block w-full"
                                  type="password"
                                  placeholder="英数字混在8文字以上"
                                  name="password"
                                  required autocomplete="new-password" />
              </div>
  
              <!-- Confirm Password -->
              <div class="">
                  <x-label for="password_confirmation" :value="__('パスワードの確認')" />
  
                  <x-input id="password_confirmation" class="block  w-full"
                                  type="password"
                                  placeholder="同じパスワードを入力"
                                  name="password_confirmation" required />
              </div>

              <!-- エリア -->
              <div class="">
                <x-label for="area" :value="__('エリア')" />
                <select class="border text-lg leading-8  py-2 px-5 pr-8 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="area" id="area" required autofocus>
                  <option disabled selected value> -- 地域を選択 -- </option>

                  @foreach($areas as $area)
                  <option value="{{ $area->id }}">{{ $area->name }}</option>
                  @endforeach
                </select>
              </div>

              <!-- 市町村 -->
              <div class="">
                <x-label for="city" :value="__('市町村')" />
                <select class="border text-lg leading-8  py-2 px-5 pr-8 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="city_id" id="city"required autofocus>
                  <option disabled selected value> -- 市町村を選択 -- </option>
                  @foreach($citiesGroup as $key => $cities)
                  <optgroup id="citiesGroup{{ $key }}" class="hidden">
                      @foreach($cities as $city)
                      <option value="{{ $city->id }}">{{ $city->name }}</option>
                      @endforeach
                    </optgroup>
                  @endforeach
                </select>
              </div>
        @endif
        {{-- 学校用フォームここまで --}}

        <div class="flex flex-col items-center my-8">
          <x-button class="my-6 bukatsu-bg-red">
              {{ __('送信') }}
          </x-button>
            <a class="underline hover:underline bukatsu-text-blue" href="{{ route('login') }}">
                {{ __('会員登録済みの方はこちら') }}
            </a>

        </div>
    </form>
  </x-auth-card>
</x-app-layout>
