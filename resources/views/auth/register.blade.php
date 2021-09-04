<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- 指導者用フォーム --}}
            @if($attribute === 'civilian')
              <!-- Name -->
              <div>
                  <x-label for="name" :value="__('お名前（フルネーム）')" />
                  <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
              </div>

              <!-- Name -->
              <div class="mt-4">
                  <x-label for="katakana" :value="__('お名前（フリガナ）')" />
                  <x-input id="katakana" class="block mt-1 w-full" type="text" name="katakana" :value="old('katakana')" required autofocus />
              </div>

              <!-- Attribute -->
              <div class="mt-4 hidden">
                  <input type="text" name="attribute" id="attribute" value="{{ $attribute }}" >
              </div>

              <!-- Email Address -->
              <div class="mt-4">
                  <x-label for="email" :value="__('メールアドレス')" />
                  <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
              </div>

              <!-- Password -->
              <div class="mt-4">
                  <x-label for="password" :value="__('パスワード')" />
                  <x-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />
              </div>

              <!-- Confirm Password -->
              <div class="mt-4">
                  <x-label for="password_confirmation" :value="__('パスワードの確認')" />
                  <x-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required />
              </div>

              <!-- Birthday -->
              <div class="mt-4">
                <x-label for="birthday" :value="__('生年月日')" />
                <x-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" required autofocus />
              </div>

              <!-- 性別 -->
              <div class="mt-4">
                <x-label for="sex" :value="__('性別')" />
                <div id="sex">
                  <label for="man">男性</label>
                  <input id="man" type="radio" name="sex" value="man" required autofocus />
                  <label for="woman">女性</label>
                  <input id="woman" type="radio" name="sex" value="woman" required autofocus />
                </div>
              </div>

              <!-- 指導種目 -->
              <div class="mt-4">
                <x-label for="club" :value="__('指導種目')" />
                <select class="border py-2 px-5 pr-8 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="club" id="club" required autofocus>
                  <option disabled selected value> -- 種目を選択 -- </option>
                  @foreach($clubs as $club)
                  <option value="{{ $club->id }}">{{ $club->name }}</option>
                  @endforeach
                </select>
              </div>

              <!-- 指導年数 -->
              <div class="mt-4">
                <x-label for="year" :value="__('指導歴（年）')" />
                <select class="border py-2 px-5 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="year" id="year" required autofocus>
                  <option value="">-</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30~</option>
                </select>
              </div>

              <!-- エリア -->
              <div class="mt-4">
                <x-label for="area" :value="__('エリア')" />
                {{dd($areas)}}
                <select class="border py-2 px-5 pr-8 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="area" id="area" required autofocus>
                  <option disabled selected value> -- 地域を選択 -- </option>

                  @foreach($areas as $area)
                  <option value="{{ $area->name }}">{{ $area->name }}</option>
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
                      <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                  </div>
      
                  <!-- Attribute -->
                  <div class="mt-4 hidden">
                      <input type="text" name="attribute" id="attribute" value="{{ $attribute }}" >
                  </div>
      
                  <!-- Email Address -->
                  <div class="mt-4">
                      <x-label for="email" :value="__('メールアドレス')" />
      
                      <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                  </div>
      
                  <!-- Password -->
                  <div class="mt-4">
                      <x-label for="password" :value="__('パスワード')" />
      
                      <x-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />
                  </div>
      
                  <!-- Confirm Password -->
                  <div class="mt-4">
                      <x-label for="password_confirmation" :value="__('パスワードの確認')" />
      
                      <x-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" required />
                  </div>

                  <!-- エリア -->
                  <div class="mt-4">
                    <x-label for="area" :value="__('エリア')" />
      
                    <select class="border py-2 px-5 pr-8 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="area" id="area" required autofocus>
                      <option value="civilian">スポーツクライミング</option>
                      <option value="school">学校</option>
                    </select>
                  </div>
                  @endif
                  {{-- 学校用フォームここまで --}}

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('会員登録済みの方はこちら') }}
                </a>

                <x-button class="ml-4">
                    {{ __('送信') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
