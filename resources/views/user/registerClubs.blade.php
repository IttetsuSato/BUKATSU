<x-app-layout>

  <x-auth-card>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

          <!-- 指導種目 -->
          <div class="">
            <x-label for="club" :value="__('部活動を選択')" />
            <div class="px-6 py-4">
              @foreach($clubs as $club)
              <div class="my-3 block">
                <input class="mr-2" type="checkbox" name="club_id" value="{{ $club->id }}">{{ $club->name }}
              </div>
              @endforeach
            </div>
          </div>

        <div class="flex flex-col items-center my-8">
          <x-button class="my-6 bukatsu-bg-red">
              {{ __('送信') }}
          </x-button>
            <a class="underline hover:underline bukatsu-text-blue" href="{{ route('login') }}">
                {{ __('会員登録済みの方はこちら') }}
            </a>

        </div>
    </form>
  </x-auth-card>
</x-app-layout>
