<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <p class="bukatsu-text-red my-2 text-center">{{ session('result') }}</p>
          @include('common.errors')

          <form class="mb-6" action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="name">名前</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="name" id="name" value="{{$user->name}}">
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="katakana">名前（カタカナ）</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="katakana" id="katakana" value="{{$user->katakana}}">
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="image">プロフィール・実績</label>
              <textarea cols="30" rows="10" name="profile" id="profile" class="border  py-2 px-3 text-grey-darkest"
              placeholder="学生の時バドミントン全国2回経験しており、国体北海道代表にも選ばれました。浦河第二中学校で３年間外部指導の経験があります。
生徒の最高実績は全道大会出場です" >{{$user->profile}}</textarea>
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="email">Eメール</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="email" id="email" value="{{$user->email}}">
            </div>
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