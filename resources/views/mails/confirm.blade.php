<x-app-layout>

  <div class="md:py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white">
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <div class="flex">
                <div class="w-5/12 flex flex-col items-center justify-between mr-5">
                  @if($user->image)
                    <img class="w-full" src="{{ asset('storage/image/' .$user->image) }}" alt="image">
                  @else
                    <i class="text-2xl mt-6 fas fa-image"></i>
                  @endif
                </div>
                <div class="w-7/12">
                  <div class="p-2 flex flex-col justify-between h-full">
                    <div>
                      <p class="font-bold text-lg">{{$user->name}}</p>
                      <p class="text-gray-600 text-xs">{{$user->katakana}}</p>
                    </div>
                    <div>
                      @if($user->city_id)
                        <p class="mt-2 text-sm"><i class="bukatsu-text-darkblue fas fa-map-pin"></i> {{$user->city->name}}</p>
                      @endif
                      <p class="mt-2 text-sm">
                        <i class="bukatsu-text-darkblue fas fa-running"></i> 
                        @foreach($user->clubs as $club)
                          {{$club->name}}<br>
                        @endforeach
                      </p>
                      <p class="mt-2 text-sm">
                        <i class="bukatsu-text-darkblue far fa-user"></i>
                        @if($user->sex == 'man')男性
                        @elseif($user->sex == 'woman')女性
                        @else 性別未登録
                        @endif
                      </p>
                      <p class="mt-2 text-sm">
                        <i class="bukatsu-text-darkblue fas fa-birthday-cake"></i>
                        @if($user->birthday){{ $user->birthday }}
                        @else 生年月日未登録
                        @endif
                      </p>
  
                      {{-- 管理者用項目 --}}
                      @auth
                        @if(Auth::user()->attribute === 'administrator')
                          <div class="mt-1 flex justify-between items-center">
                            <p class="text-gray-400">{{$user->attribute}}</p>
                            <div class="flex justify-center">
                              <!-- 更新ボタン -->
                              <form action="{{ route('user.edit',$user->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="mr-2 ml-2 text-md bukatsu-text-blue">
                                  <i class="fas fa-edit"></i>
                                </button>
                              </form>
                              <!-- 削除ボタン -->
                              <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="mr-2 ml-2 text-md bukatsu-text-red">
                                  <i class="fas fa-trash-alt"></i>
                                </button>
                              </form>
                            </div>
                          </div>
                        @endif
                      @endauth
                      {{-- ここまで管理者用項目 --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col my-8 border border-gray-200">
              <p class="px-4 py-2 mb-2 font-bold text-lg bukatsu-text-darkblue bg-gray-50">プロフィール</p>
              <p class="px-5 py-3 text-grey-700 text-sm" id="profile">
                {{$user->profile}}
              </p>
            </div>

            <div class="flex flex-col my-8 border border-gray-200">
              <p class="px-4 py-2 mb-2 font-bold text-lg bukatsu-text-white bukatsu-bg-blue">オファーメールを送る</p>
              <form class="mb-6" action="{{ route('confirm') }}" method="POST">
                @csrf
                <div class="px-5 py-3 text-grey-700 text-sm">
                  名前：
                  <input class="border-0 border-b border-gray-400 py-2 px-3" type="text" name="name" id="name" value="{{$user->name}}">
                </div>
                <div class="px-5 py-3 text-grey-700 text-sm">
                  宛先：
                  <input class="border-0 border-b border-gray-400 py-2 px-3" type="text" name="email" id="email" value="{{$user->email}}">
                </div>
                <div class="px-5 py-3 text-grey-700 text-sm">
                  本文：
                  <textarea class="border-gray-400 py-2 px-3 my-4 w-full" name="body" id="body"  rows="10">{{ old('body') }}</textarea>
                </div>
                <div class="flex justify-evenly">
                  <x-button>
                    {{ __('確認画面へ') }}
                  </x-button>
                </div>
              </form>
              <p class="px-5 py-3 text-grey-700 text-sm" id="profile">
                {{$user->profile}}
              </p>
            </div>
            <a href="#" onclick="history.back(-1);return false;" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              Back
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>