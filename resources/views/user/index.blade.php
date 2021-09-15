<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-lg bukatsu-text-darkblue leading-tight">
      {{ __('登録者一覧') }}
    </h2>
  </x-slot>
  
  
  <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="px-4 px-6 lg:px-8 bg-white border-b border-gray-200">
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
        <div class="w-full md:w-5/12 py-4 px-6 my-2 sm:mx-4 border border-gray shadow">
          <div class="flex">
            <div class="w-4/12 flex flex-col items-center justify-between mr-5">
              @if($user->image)
                      <img class="w-full" src="{{ asset('storage/image/' .$user->image) }}" alt="image">
                      @else
                      <i class="text-2xl fas fa-image"></i>
                      @endif
                    </div>
                    <div class="w-8/12">
                      <div class="p-2">
                        <p class="font-bold text-lg">{{$user->name}}</p>
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
                      <div class="p-2 h-28">
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
      </div>
</x-app-layout>