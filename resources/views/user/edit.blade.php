<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-lg bukatsu-text-darkblue leading-tight">
      {{ __('プロフィール') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <p class="bukatsu-text-red my-2 text-center">{{ session('result') }}</p>
          @include('common.errors')
          <form class="mb-6" action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="name">名前</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="name" id="name" value="{{$user->name}}">
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="katakana">名前（カタカナ）</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="katakana" id="katakana" value="{{$user->katakana}}">
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="image">イメージ</label>
              <img src="{{ asset('storage/image/' .$user->image) }}" width="300" alt="noimage">
              <input type="file" name="image" class="border py-2 px-3 text-grey-darkest" autocomplete="image">
            
              <x-croppie />
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="image">プロフィール</label>
              <textarea cols="30" rows="10" name="profile" id="profile" class="border  py-2 px-3 text-grey-darkest">{{$user->profile}}</textarea>
            </div>
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="email">Eメール</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="email" id="email" value="{{$user->email}}">
            </div>
            <div class="flex justify-evenly">
              <x-button>
                {{ __('更新') }}
              </x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>