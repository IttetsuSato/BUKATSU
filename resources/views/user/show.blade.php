<x-app-layout>

  <div class="md:py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white">
          <p class="bukatsu-text-red my-2 text-center">{{ session('result') }}</p>
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <div class="flex">
                <div class="w-5/12 flex flex-col items-center justify-between mr-5">
                  @if($user->image)
                    <img class="w-full" src="{{ asset('storage/image/' .$user->image) }}" alt="image">
                  @else
                    <img class="w-full" src="{{ asset('storage/default_image/user_default.png') }}" alt="image">
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
              <p class="px-4 py-2 mb-2 font-bold text-lg bukatsu-text-darkblue bg-gray-50">実績・プロフィール</p>
              <p class="px-5 py-3 text-grey-700 text-sm" id="profile">
                {{$user->profile}}
              </p>
            </div>
            
            <div class="flex flex-col my-8 border border-gray-200">
                <p class="px-4 py-2 mb-2 font-bold text-lg bukatsu-text-white bukatsu-bg-blue">オファーメールを送る</p>
                <p class="px-5 py-3 text-grey-700 text-sm">
                  オファーメールでは、{{$user->name}}様にオファーメッセージとともにあなたのメールアドレスを送信します。尚、今後の手続きとしては
                </p>
                <p class="px-5 py-2 text-grey-700 text-sm">1.{{$user->name}}様との面談</p>
                <p class="px-5 py-2 text-grey-700 text-sm">2.オファー成立</p>
                <p class="px-5 py-2 text-grey-700 text-sm">3.部活動指導開始</p>
                <p class="px-5 py-3 text-grey-700 text-sm">となっております。</p>
                <form class="mb-6" action="{{ route('execute') }}" method="POST">
                  @csrf
                    <input class="hidden" type="hidden" name="name" id="name" value="{{$user->name}}">
                    <input class="hidden" type="hidden" name="email" id="email" value="{{$user->email}}">
                  <div class="flex justify-evenly mb-3 mt-5">
                    <x-button class="bukatsu-bg-red">
                      {{ __('オファーを送る') }}
                    </x-button>
                  </div>
                </form>
              
            </div>
            <a href="#" onclick="history.back(-1);return false;" class="block text-center w-6/12 py-3 mt-6 mx-auto font-medium rounded-sm tracking-widest text-white uppercase bg-gray-500 shadow-sm focus:outline-none hover:bg-gray-600 hover:shadow-none">
              戻る
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>