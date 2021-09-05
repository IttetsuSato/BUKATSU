<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('エリア選択') }}
      </h2>
  </x-slot>

  <section>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <ul>
                    @foreach($areas as $area)
                    <li class="border-b border-gray-600">{{$area->name}}</li>
                    <ul class="">
                      @foreach($area->cities as $city)
                      <li>
                        <a href="{{ route('user.city', $city->id) }}">{{ $city->name }}</a>
                      </li>
                      @endforeach
                    </ul>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>

  </section>
</x-app-layout>