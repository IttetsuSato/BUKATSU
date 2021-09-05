<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('トップページ') }}
      </h2>
  </x-slot>

  {{-- 非ログイン時 --}}
  @auth
  @else
    <section>
      <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">ログイン</a>

          <div>
            <p>学校</p>
            <a href="{{ route('registerSchool') }}" class="ml-4 text-sm text-gray-700 underline">新規登録</a>
          </div>
          <div>
            <p>指導者</p>
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">新規登録</a>
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
    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">ログイン</a>

  </section>
</x-app-layout>
