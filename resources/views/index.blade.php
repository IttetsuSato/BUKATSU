<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('トップページ') }}
      </h2>
  </x-slot>

  {{-- 非ログイン時 --}}
  @auth
  @else
    <section class="bukatsu-bg-skyblue">
      <div class="sm:px-6 lg:px-8 pt-10">
        <div class="text-center">
          <p class="bukatsu-text-blue font-extrabold text-lg">BUKATSUは<br>部活と地域のスポーツ指導したい人を<br>つなぐアプリです</p>
        </div>
        <div class="flex justify-evenly mt-4">
          <div class="bukatsu-register-button">
            <label class="bukatsu-text-yellow">学校</label>
            <button class="bukatsu-bg-yellow">
              <a href="{{ route('registerSchool') }}">新規登録</a>
            </button>

          </div>
          <div class="bukatsu-register-button">
            <label class="bukatsu-text-red">指導者</label>
            <button class="bukatsu-bg-red">
              <a href="{{ route('register') }}">新規登録</a>
            </button>
          </div>
        </div>
      </div>

    </section>
  @endauth
  {{-- ここまで非ログイン時 --}}

  <section class="bukatsu-bg-yellow">
        <div class="sm:px-6 lg:px-8 py-10">
          <div class="text-center">
            <div class="mb-8 mx-auto">
              <h2 class="bukatsu-text-white text-2xl font-bold">特徴</h2>
            </div>
            <div class="px-8 my-8">
              <div class="flex justify-evenly overflow-x-auto no-scroll-bar">
                <div class="bukatsu-feature m-3">
                  <div class="text-8xl"><i class="fab fa-creative-commons-nc-jp"></i></div>
                  <h2 class="font-extrabold text-2xl my-3">登録も利用も<br>完全無料</h2>
                  <p class="font-bold text-left">BUKATSUは、学校の部活指導のオファーやスポーツを指導したい人をつなぐ機能を無料で利用できます。部活指導を依頼したい学校も教えたい人も費用は0円です。</p>
                </div>
                <div class="bukatsu-feature m-3">
                  <div class="text-8xl"><i class="fas fa-skiing-nordic"></i></div>
                  <h2 class="font-extrabold text-2xl my-3">「指導力」を<br>登録してアピール</h2>
                  <p class="font-bold text-left">指導力とは自分のスポーツ指導の経験や知識を簡単に表す機能です。BUKATSUでは、この指導力をもとに学校側に自分を知ってもらうことができます。</p>
                </div>
                <div class="bukatsu-feature m-3">
                  <div class="text-8xl"><i class="fas fa-comment-dots"></i></div>
                  <h2 class="font-extrabold text-2xl my-3">チャットで<br>簡単にやりとり</h2>
                  <p class="font-bold text-left">BUKATSUでは、学校側とスポーツを指導したい人がマッチした後は、チャットで会話できます。 全ては学生のために必要なことを素早く簡単にやりとりしましょう。</p>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap justify-evenly">
              <button class="bukatsu-button bukatsu-bg-blue m-3">
                <a href="{{ route('area.search') }}" class="bukatsu-text-white font-extrabold text-lg">地域から探す</a>
              </button>
              <button class="bukatsu-button bukatsu-bg-blue m-3">
                <a href="{{ route('club.search') }}" class="bukatsu-text-white font-extrabold text-lg">種目から探す</a>
              </button>
            </div>
          </div>
        </div>

  </section>
  
  <section>
    @foreach($news as $new)
    
    @endforeach
  </section>
</x-app-layout>
