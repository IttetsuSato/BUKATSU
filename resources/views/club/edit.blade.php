<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          @include('common.errors')
          <form class="mb-6" action="{{ route('club.update',$club->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="name">部活名</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="name" id="name" value="{{$club->name}}">
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="image">イメージ</label>
              @if($club->image)
              <img src="{{ asset('storage/image/' .$club->image) }}" width="300" alt="image">
              @else
              <img src="{{ asset('storage/default_image/sport.jpg') }}" width="300" alt="image">
              @endif
              <input type="file" name="image" class="border py-2 px-3 text-grey-darkest" autocomplete="image">
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="attribute">属性</label>
              <select class="border py-2 px-3 text-grey-darkest" name="attribute" id="attribute">
                @if($club->attribute === 'sports')
                  @php
                    $selectSports = "selected"; $selectLiberal = "";
                  @endphp
                @elseif($club->attribute === 'liberal_arts')
                  @php
                    $selectSports = ""; $selectLiberal = "selected";
                  @endphp
                @endif
                <option value="sports" {{ $selectSports }}>体育会系</option>
                <option value="liberal_arts" {{ $selectLiberal }}>文化系</option>
              </select>
            </div>
            <div class="flex justify-evenly">
              <a href="{{ route('club.index') }}" class="block text-center w-5/12 py-3 mt-6 font-medium tracking-widest text-black uppercase bg-gray-100 shadow-sm focus:outline-none hover:bg-gray-200 hover:shadow-none">
                Back
              </a>
              <button type="submit" class="w-5/12 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                Update
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>