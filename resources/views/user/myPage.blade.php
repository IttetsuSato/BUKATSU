<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <p class="bukatsu-text-red my-2 text-center">{{ session('result') }}</p>
          @include('common.errors')


          <div class="flex justity-center items-center text-center mb-8">
            <h2 class="bukatsu-text-blue font-bold text-xl">マイページ</h2>
          </div>
          <div class="flex flex-col items-center my-6">
            
            <div class=" w-full md:w-8/12 mb-4">
              <div class="flex flex-col items-center">
                <div class="w-5/12 mb-5">
                  @if(Auth::user()->image)
                  <img class="w-full" src="{{ asset('storage/image/'.Auth::user()->image) }}" alt="画像が読み込めませんでした">
                  @else
                  <img class="w-full" src="{{ asset('storage/default_image/user_default.png') }}" alt="image">
                  @endif
                </div>
                
                
                <form name="myPageImageForm" class="" action="{{ route('user.updateImage',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <label class="rounded-full bg-gray-100 px-3 py-2" for="myPageImageInput">
                    <i class="fas fa-camera"></i>
                    <input id="myPageImageInput" class="hidden" value="" type="file" name="image" accept="image/*" autocomplete="image">
                    編集
                  </label>
                </form>
              </div>
            </div>
            <div class="flex flex-col items-center justity-center my-4 w-full md:w-8/12">
              <a class="w-full" href="{{ route('user.edit', Auth::user()->id) }}">
                <x-button class="w-full">
                  {{ __('ユーザー情報の変更') }}
                </x-button>
              </a>
              <p class="text-gray-800 py-2">※顔写真、ユーザー情報を詳しく記載することで学校側があなたを見つけやすくマッチング率を高めます。</p>
            </div>
            
  
            <div class="flex items-center justity-center my-4  w-full md:w-8/12">
              <a class="w-full" href="{{ route('registerClubs') }}">
                <x-button class="w-full">
                  {{ __('登録部活動の変更') }}
                </x-button>
              </a>
            </div>
          </div>

          <div class="my-6 mt-10">
            <a href="#" onclick="history.back(-1);return false;" class="block text-center w-6/12 py-3 mt-6 mx-auto font-medium rounded-sm tracking-widest text-white uppercase bg-gray-500 shadow-sm focus:outline-none hover:bg-gray-600 hover:shadow-none">
              戻る
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>