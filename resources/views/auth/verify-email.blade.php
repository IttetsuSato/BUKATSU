<x-app-layout>
    <x-auth-card>

      <div class="px-6 py-10">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('ご登録いただいたメールアドレスに確認用のリンクをお送りしました。もし確認用メールが送信されていない場合は、下記をクリックしてください。') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('確認用のリンクを再送しました！メールをご確認ください。') }}
            </div>
        @endif

        <div class="mt-4 flex flex-col items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button class="my-6">
                        {{ __('確認メールを再送信する') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('ログアウト') }}
                </button>
            </form>
        </div>
      </div>
    </x-auth-card>
</x-app-layout>
