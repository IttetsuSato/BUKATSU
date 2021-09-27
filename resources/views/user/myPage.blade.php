<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <p class="bukatsu-text-red my-2 text-center">{{ session('result') }}</p>
          @include('common.errors')


          <div class="flex fustity-center items-center text-center mb-8">
            <h2 class="bukatsu-text-blue font-bold text-xl">マイページ</h2>
          </div>
          <div class="flex items-center my-6 w-8/12">
            <a href="{{ route('user.edit', Auth::user()->id) }}">
              <x-button>
                {{ __('ユーザー情報の変更') }}
              </x-button>
            </a>
          </div>

          <div class="flex items-center my-6 w-8/12">
            <a href="{{ route('registerClubs') }}">
              <x-button>
                {{ __('登録部活動の変更') }}
              </x-button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>