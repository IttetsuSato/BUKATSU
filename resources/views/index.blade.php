<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('トップページ') }}
      </h2>
  </x-slot>

  {{-- 非ログイン時 --}}
  @auth
  @else
    <section class="bukatsu-section1">

      <div class="sm:px-6 lg:px-8 pt-8">
        <div class="text-center">
          <p class="bukatsu-blue font-extrabold text-lg">BUKATSUは<br>部活と地域のスポーツ指導したい人を<br>つなぐアプリです</p>
        </div>
        <div class="flex justify-evenly mt-4">
          <div class="bukatsu-register-button school">
            <label>学校</label>
            <button>
              <a href="{{ route('registerSchool') }}">新規登録</a>
            </button>

          </div>
          <div class="bukatsu-register-button civilian">
            <label>指導者</label>
            <button>
              <a href="{{ route('register') }}">新規登録</a>
            </button>
          </div>
        </div>
      </div>

    </section>
  @endauth
  {{-- ここまで非ログイン時 --}}

  <section>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div>
                    <a href="{{ route('area.search') }}" class="ml-4 text-sm text-gray-700">地域から探す</a>
                  </div>
                  <div>
                    <a href="{{ route('club.search') }}" class="ml-4 text-sm text-gray-700">種目から探す</a>
                  </div>
                </div>
            </div>
        </div>
    </div>

  </section>
  
  <section>
    @foreach($news as $new)
    
    @endforeach
  </section>
</x-app-layout>
