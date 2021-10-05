<x-app-layout>

  {{-- 非ログイン時 --}}
  @auth
  @else
    <section class="bukatsu-bg-skyblue">
      <div class="sm:px-6 lg:px-8 pt-16">
        <div class="text-center">
          <p class="bukatsu-text-blue font-bold text-xl md:text-3xl tracking-wide">
            BUKATSUは<br>
            学校の部活と地域の<br>
            スポーツ、文化系を指導したい人を<br>
            つなぐプラットフォームです
          </p>
        </div>
        <div class="mx-auto  my-8 sm:max-w-2xl">
          <div class="flex justify-evenly">
            <div class="text-lg text-center font-bold">
              <label class="bukatsu-text-yellow block w-full">学校・自治体<br>の方はこちら</label>
              <button class="bukatsu-bg-yellow bukatsu-text-white  text-xl font-bold py-3 px-12 mt-3 rounded-full">
                <a href="{{ route('registerSchool') }}">新規登録</a>
              </button>
            </div>
            <div class="text-lg text-center font-bold">
              <label class="bukatsu-text-red block w-full">指導者<br>の方はこちら</label>
              <button class="bukatsu-bg-red bukatsu-text-white text-xl font-bold py-3 px-12 mt-3 rounded-full ">
                <a href="{{ route('register') }}">新規登録</a>
              </button>
            </div>
          </div>
        </div>
        <div class="mt-4 px-12 max-w-sm mx-auto">
          <img class="text-center mx-auto" src="{{ asset('storage/default_image/two_mens.png') }}" alt="image">
        </div>
      </div>

    </section>
  @endauth
  {{-- ここまで非ログイン時 --}}

  <section class="bukatsu-bg-yellow">
        <div class="sm:px-6 lg:px-8 py-10">
          <div class="text-center">
            <div class="mb-8 mx-auto">
              <h2 class="bukatsu-text-white text-3xl font-bold tracking-wider">特徴</h2>
            </div>
            <div class="px-8 my-8">
              <div class="flex overflow-x-auto pb-4">
                <div class="bukatsu-feature m-3">
                  <div class="text-8xl"><i class="fab fa-creative-commons-nc-jp"></i></div>
                  <h2 class="font-extrabold text-2xl my-3">マッチング無料</h2>
                  <p class="font-bold text-left">BUKATSUは、学校の部活指導のオファーやスポーツを指導したい人をつなぐ機能を無料で利用できます。部活指導を依頼したい学校も教えたい人もマッチングは0円です。</p>
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
                <div class="bukatsu-feature m-3">
                  <div class="text-8xl"><i class="fas fa-users"></i></div>
                  <h2 class="font-extrabold text-2xl my-3">指導者同士の<br>コミュティ</h2>
                  <p class="font-bold text-left">BUKATSUの中で出会った指導者同士にコミュニティが生まれ、繋がりが持てます。</p>
                </div>
                <div class="bukatsu-feature m-3">
                  <div class="text-8xl"><i class="fas fa-user-plus"></i></div>
                  <h2 class="font-extrabold text-2xl my-3">簡単登録</h2>
                  <p class="font-bold text-left">書面で手間のかかる登録作業もBUKATSUだとわずか、３ステップ。誰でも簡単に登録ができます</p>
                </div>
                <div class="bukatsu-feature m-3">
                  <div class="text-8xl"><i class="fas fa-mobile"></i></div>
                  <h2 class="font-extrabold text-2xl my-3">ペーパーレス</h2>
                  <p class="font-bold text-left">全てオンラインで完結し紙の書類手続き、紙の履歴書は不要。</p>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap justify-evenly">
              <a href="{{ route('area.search') }}" class="font-extrabold text-lg">
                <button class="bukatsu-search-button bukatsu-bg-blue m-3 font-extrabold text-lg">
                  地域から探す
                </button>
              </a>
              <a href="{{ route('club.search') }}" class="font-extrabold text-lg">
                <button class="bukatsu-search-button bukatsu-bg-blue m-3 font-extrabold text-lg">
                  種目から探す
                </button>
              </a>
            </div>
          </div>
        </div>

  </section>
  
  <section class="bukatsu-bg-red">
    <div class="px-4 sm:px-6 lg:px-8 py-10">
      <div class="text-center">
        <div class="mb-8 mx-auto">
          <h2 class="bukatsu-text-white text-3xl font-bold tracking-wide">NEWS</h2>
        </div>
      </div>
      <div class="my-8 grid grid-flow-col grid-cols-1 grid-rows-4 md:grid-cols-2 md:grid-rows-2">
        @foreach($news as $new)
        <div>
          <div class="my-3 md:mx-4 md:px-6 md:py-3">
            @if($new->attribute === 'school')
              <div>
                @if($new->image)
                  <img class="rounded-lg" src="{{ asset('storage/image/'. $new->image) }}" alt="image">
                @else
                  <img class="rounded-lg" src="{{ asset('storage/default_image/school.jpg') }}" alt="image">
                @endif

              </div>
              <div class="p-2">
                <p class="bukatsu-text-white my-2">{{ $new->created_at->format('Y.m.d') }}</p>
                <p class="bukatsu-text-white font-bold text-lg">
                  {{ $new->name }}が仲間入りしました
                </p>
              </div>
            @endif
            @if($new->attribute === 'civilian')
              @foreach($new->clubs as $club)
                <div>
                  @if($club->image)
                    <img class="rounded-lg" src="{{ asset('storage/image/'. $club->image) }}" alt="{{$club->image}}">
                  @else
                    <img class="rounded-lg" src="{{ asset('storage/default_image/sport.jpg') }}" alt="image">
                  @endif
                </div>
                <div class="p-2">
                  <p class="bukatsu-text-white my-2">{{ $new->created_at->format('Y.m.d') }}</p>
                  <p class="bukatsu-text-white font-bold text-lg">
                    {{ $new->city->name }}で{{ $club->name }}が指導できるようになりました
                  </p>
                </div>
              @endforeach
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</x-app-layout>
