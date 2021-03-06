<x-app-layout>

  <section>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-10">
      <div class="bg-white overflow-hidden">
          <div class="bg-white border border-gray-200">
            <ul>
              @foreach($clubs as $club)
              <li class="bukatsu-area">
                <div class="bukatsu-area-title border-b-2 border-gray-400 py-4 px-6 bukatsu-text-blue text-xl font-bold hover:bg-gray-100">
                  <a class="flex justify-between items-center " href="{{ route('user.club', $club->id) }}">
                    <div> {{$club->name}}</div>
                    <i class="fas fa-chevron-right"></i>
                  </a>
                </div>
              </li>
              @endforeach
            </ul>
            <div class="flex justify-center my-6">
              <a href="{{ route('top') }}" class="font-extrabold text-lg">
                <button class="bukatsu-search-button bukatsu-bg-blue m-3 font-extrabold text-lg">
                  トップに戻る
                </button>
              </a>
            </div>
          </div>
      </div>
    </div>

  </section>
</x-app-layout>