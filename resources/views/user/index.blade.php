<x-app-layout>
  
    <div class="w-full bukatsu-bg-skyblue py-6 px-4 md:px-6 lg:px-8">
      <div class="flex justify-center flex-wrap">
        @if($users->isEmpty())
          <div class="w-full md:w-5/12 py-4 px-6 my-8 mx-4 border border-gray shadow">
            <div class="h-44 flex flex-col justify-center items-center">
              <p class="font-bold text-xl text-gray-600">条件に該当する登録者がいません</p>
              <a href="#" onclick="history.back(-1);return false;" class="block text-center w-1/2 py-3 mt-6 font-medium tracking-widest text-white uppercase bukatsu-bg-blue">
                戻る
              </a>
            </div>
          <div>
        @else
        @foreach ($users as $user)
        <div class="w-full md:w-5/12 py-4 px-6 my-2 sm:mx-4 border border-gray shadow-lg bukatsu-bg-white rounded-sm">
          <div class="flex">
            <div class="w-5/12 flex flex-col items-center justify-between mr-5">
              @if($user->image)
                <img class="w-full" src="{{ asset('storage/image/' .$user->image) }}" alt="image">
              @else
                <i class="text-2xl mt-6 fas fa-image"></i>
              @endif
            </div>
                <div class="w-7/12">
                  <div class="p-2">
                    <p class="font-bold text-lg">{{$user->name}}</p>
                    @if($user->city_id)
                      <p class="mt-2 text-sm"><i class="bukatsu-text-darkblue fas fa-map-pin"></i> {{$user->city->name}}</p>
                    @endif
                    <p class="mt-2 text-sm">
                      <i class="bukatsu-text-darkblue fas fa-running"></i> 
                      @foreach($user->clubs as $club)
                        {{$club->name}}<br>
                      @endforeach
                    </p>

                    {{-- 管理者用項目 --}}
                    @auth
                      @if(Auth::user()->attribute === 'administrator')
                        <div class="flex justify-between items-center">
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
                  <div class="p-2 sm:my-2 h-20 overflow-hidden">
                    <p class="text-md">{{$user->profile}}</p>
                  </div>
                  <div class="flex justify-end">
                    <a href="{{ route('user.show', $user->id) }}">
                      <x-button>
                        {{ __('詳細') }}
                      </x-button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
</x-app-layout>