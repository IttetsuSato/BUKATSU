<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200">
          <p class="bukatsu-text-red my-2 text-center">{{ session('result') }}</p>
          @include('common.errors')
          @if(Auth::user()->attribute === 'administrator')
          <div class="flex flex-col items-center my-8">
            <p class="bukatsu-text-red my-2">※他人の画像編集は管理者のみ表示されます</p>
            <div class="w-5/12 mb-5">
              @if($user->image)
              <img class="w-full" src="{{ asset('storage/image/'.$user->image) }}" alt="画像が読み込めませんでした">
              @else
              <img class="w-full" src="{{ asset('storage/default_image/user_default.png') }}" alt="image">
              @endif
            </div>
            
            
            <form name="myPageImageForm" class="" action="{{ route('user.updateImage',$user->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <label class="rounded-full bg-gray-100 px-3 py-2" for="myPageImageInput">
                <i class="fas fa-camera"></i>
                <input id="myPageImageInput" class="hidden" value="" type="file" name="image" accept="image/*" autocomplete="image">
                編集
              </label>
            </form>
          </div>
          @endif

          <form class="mb-6" action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf

          <!-- Name -->
          <div>
            <x-label for="name" :value="__('お名前（フルネーム）')" />
            <x-input id="name" class="block w-full placeholder-gray-500 placeholder-opacity-50" type="text" name="name"  value="{{$user->name}}" required autofocus />
          </div>

          <!-- カタカナ -->
          <div class="">
              <x-label for="katakana" :value="__('お名前（フリガナ）')" />
              <x-input id="katakana" class="block  w-full" type="text" name="katakana" value="{{$user->katakana}}" required autofocus />
          </div>

          <!-- Email Address -->
          <div class="">
              <x-label for="email" :value="__('メールアドレス')" />
              <x-input id="email" class="block  w-full" type="email" name="email" value="{{$user->email}}" required />
          </div>

          {{-- <!-- 郵便番号 -->
          <div class="">
            <x-label for="postal_code" :value="__('郵便番号（ハイフン無し）')" />
            <x-input id="postal_code" class="block  w-full ajaxzip3"
            maxlength="8" 
            onBlur="AjaxZip3.zip2addr(this,'','address','address');"
                            type="text"
                            placeholder="例：1234567"
                            :value="old('postal_code')"
                            name="postal_code"
                            required autofocus/>
          </div>

          <!-- 住所 -->
          <div class="">
            <x-label for="address" :value="__('住所')" />
            <x-input id="address" class="block  w-full"
                            type="text"
                            :value="old('address')"
                            name="address"
                            autofocus/>
          </div>

          <!-- 電話番号 -->
          <div class="">
            <x-label for="phone"  :value="__('電話番号')" />
            <div class="py-3 px-3">
              <input class="border border-gray-400 w-3/12 rounded-md px-2 py-1" maxlength="4" name="tel1" id="tel1" required autofocus :value="old('tel1')">
              - <input class="border border-gray-400 w-3/12 rounded-md px-2 py-1 " maxlength="4" name="tel2" id="tel2" required autofocus :value="old('tel2')">
              - <input class="border border-gray-400 w-3/12 rounded-md px-2 py-1" maxlength="4" name="tel3" id="tel3" required autofocus :value="old('tel3')">
            </div>
          </div>

          <!-- 最終学歴 -->
          <div class="">
            <x-label for="final_education" :value="__('最終学歴')" />
            <select class="border text-lg leading-8  py-2 px-5 pr-8 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="final_education" id="final_education" autofocus>
              <option disabled selected value> -- 最終学歴を選択 -- </option>
              <option value="中学卒">中学卒</option>
              <option value="高校卒">高校卒</option>
              <option value="大学卒">大学卒</option>
            </select>
          </div>

          <!-- 卒業校 -->
          <div class="">
            <x-label for="graduated_from" :value="__('卒業した学校名')" />
            <x-input id="graduated_from" class="block  w-full" 
            type="text" 
            name="graduated_from" 
            :value="old('graduated_from')"
            autofocus />
          </div>

          <!-- 移動手段 -->
          <div class="">
            <x-label for="transportation" :value="__('車の有無')" />
            <div id="transportation"  class="text-lg leading-6 px-5 py-4">
              <div class="mx-2 inline">
                <label for="haveCar">車あり</label>
                <input id="haveCar" type="radio" name="transportation" value="車あり" autofocus />
              </div>
              <div class="mx-2 inline">
                <label for="haventCar">車なし</label>
                <input id="haventCar"  type="radio" name="transportation" value="車なし" autofocus />
              </div>
            </div>
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
          </div> --}}
          
          <!-- 指導年数 -->
          {{-- <div class="">
            <x-label for="career" :value="__('指導歴（年）')" />
            <select class="border text-lg leading-8  py-2 px-5 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="career" id="career" required autofocus>
            </select>
          </div> --}}
          
          <!-- プロフィール -->
          <div>
            <x-label for="profile" :value="__('プロフィール・実績')" />
            <textarea rows="4" name="profile" id="profile" 
            class="w-full text-lg px-4 mb-0 leading-8 border-gray-300 placeholder-gray-500 placeholder-opacity-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  
            placeholder="例）学生の時バドミントン全国2回経験しており、国体北海道代表にも選ばれました。浦河第二中学校で３年間外部指導の経験があります。
生徒の最高実績は全道大会出場です" 
            value="{{ $user->profile }}" 
            autofocus></textarea>
          </div>




            {{-- <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="name">名前</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="name" id="name" value="{{$user->name}}">
            </div> --}}
            {{-- <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="katakana">名前（カタカナ）</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="katakana" id="katakana" value="{{$user->katakana}}">
            </div> --}}
            {{-- <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="email">Eメール</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="email" id="email" value="{{$user->email}}">
            </div> --}}
            <div class="flex flex-col items-center justify-center my-8">
                @if (Route::has('password.request'))
                    <a class="hover:underline bukatsu-text-blue" href="{{ route('password.request') }}">
                        {{ __('パスワードの変更はこちら') }}
                    </a>
                @endif
            </div>
            <div class="flex justify-evenly mt-8">
              <x-button id="uploadButton" class="bukatsu-bg-red">
                {{ __('更新') }}
              </x-button>
            </div>
            <a href="{{ route('myPage') }}" class="block text-center w-6/12 py-3 mt-8 mx-auto font-medium rounded-sm tracking-widest text-white uppercase bg-gray-500 shadow-sm focus:outline-none hover:bg-gray-600 hover:shadow-none">
              戻る
            </a>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>