<x-app-layout>

  <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 sm:py-10">
            <div class="bg-white overflow-hidden">
                <div class="bg-white border border-gray-200">
                  <ul>
                    @foreach($areas as $area)
                    <li class="bukatsu-area">
                      <div class="bukatsu-area-title flex justify-between items-center border-b-2 border-gray-400 py-4 px-6 bukatsu-text-blue text-xl font-bold hover:bg-gray-100">
                        <div> {{$area->name}}</div>
                        <i class="fas fa-chevron-down"></i>
                      </div>
                      <ul class="bukatsu-cities hidden">
                        @foreach($area->cities as $city)
                        <li>
                          <a href="{{ route('user.city', $city->id) }}">
                            <div class="border-b border-gray-200 py-3 px-5 bukatsu-text-blue hover:bg-gray-100">
                              {{ $city->name }}
                            </div>
                          </a>
                        </li>
                        @endforeach
                      </ul>
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