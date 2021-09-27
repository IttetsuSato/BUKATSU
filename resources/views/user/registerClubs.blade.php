<x-app-layout>

  <x-auth-card>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('updateClubs', Auth::user()->id) }}">
        @csrf

          <!-- 指導種目 -->
          <div class="">
            <x-label for="club" :value="__('部活動を選択')" />
            <div class="px-6 py-4">
              @foreach($clubs as $club)
                <?php
                  foreach($club->users as $user){
                    $checked = '';
                    if($user->id == Auth::user()->id){
                      $checked = 'checked';
                      break;
                    }
                  }
                ?>
                <div class="my-3 block">
                  <label>
                      <input class="mr-2" type="checkbox" name="club_id[]" value="{{ $club->id }}" {{$checked}}>{{ $club->name }}
                  </label>
                </div>
              @endforeach
            </div>
          </div>

        <div class="flex flex-col items-center my-8">
          <x-button class="my-6 bukatsu-bg-red">
              {{ __('送信') }}
          </x-button>

        </div>
    </form>
  </x-auth-card>
</x-app-layout>
