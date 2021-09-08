<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8 bukatsu-navigation">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                  <a href="{{route('top')}}">
                    <img src="{{ asset('storage/default_image/logo.png') }}" width="200" alt="image">
                  </a>
                </div>

                @auth

                  {{-- 管理者用リンク --}}
                  @if(Auth::user()->attribute === 'administrator')

                  <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('club.index')" :active="request()->routeIs('club.index')">
                      {{ __('部活一覧') }}
                    </x-nav-link>
                  </div>

                  <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                      {{ __('登録者一覧') }}
                    </x-nav-link>
                  </div>

                  @endif
                  {{-- 管理者用リンク終わり --}}
                @endauth
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
              @auth
                  <x-dropdown align="right" width="48">
                      <x-slot name="trigger">
                          <button class="flex items-center text-lg font-medium bukatsu-dropdown">
                              <div>{{ Auth::user()->name }}</div>
    
                              <div class="ml-1">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                  </svg>
                              </div>
                          </button>
                      </x-slot>
    
                      <x-slot name="content">
                        <!-- 更新ボタン -->
                        <form action="{{ route('user.edit', Auth::user()->id) }}" method="GET">
                          @csrf
                          
                          <x-dropdown-link :href="route('user.edit', Auth::user()->id)"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="mr-2 fas fa-user"></i>
                            {{ __('マイページ') }}
                          </x-dropdown-link>
                        </form>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="mr-2 fas fa-sign-out-alt"></i>
                                {{ __('ログアウト') }}
                            </x-dropdown-link>
                        </form>
                      </x-slot>
                  </x-dropdown>
              @else
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">ログイン</a>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">新規登録</a>
                  @endif
              @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 bukatsu-hamburger">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

      @auth

        {{-- 管理者用リンク --}}
        @if(Auth::user()->attribute === 'administrator')
        <div class="pt-2 pb-3 space-y-1">
          <x-responsive-nav-link :href="route('club.index')" :active="request()->routeIs('club.index')">
            {{ __('部活一覧') }}
          </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
          <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
            {{ __('登録者一覧') }}
          </x-responsive-nav-link>
        </div>
        @endif
        {{-- 管理者用リンク終わり --}}

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- 更新ボタン -->
                <form action="{{ route('user.edit', Auth::user()->id) }}" method="GET">
                  @csrf
                  
                  <x-responsive-nav-link :href="route('user.edit', Auth::user()->id)"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    <i class="mr-2 fas fa-user"></i>
                    {{ __('マイページ') }}
                  </x-responsive-nav-link>
                </form>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="mr-2 fas fa-sign-out-alt"></i>
                        {{ __('ログアウト') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

      @else
        <div class="pt-2 pb-3 space-y-1">
          <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
            {{ __('ログイン') }}
          </x-responsive-nav-link>
        </div>

        @if (Route::has('register'))
          <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
            {{ __('新規登録') }}
          </x-responsive-nav-link>
        @endif
      @endauth
    </div>
</nav>
