<p>{{ $name }}様</p>
<p>BUKATSUをご利用いただきありがとうございます</p>


<p>【BUKATSU】アプリ上で、{{ Auth::user()->name }}様から部活指導のオファーがございました。</p>
<p>部活動のオファーを受ける場合は、以下のアドレス　{{ $email }}　までご連絡ください。<p>

  <p>尚、今後の手続きとしては<br>
    1.{{ Auth::user()->name }}様と面談<br>
    2.オファー成立<br>
3.部活動指導開始<br>
となっております。</p>

<p>{{ $name }}様が学校の部活動指導や地域のスポーツ、文化教育に携わっていただくことに感謝いたします。</p>
<p>何かご不明な点がございましたら以下のお問い合わせ先までご連絡ください。</p>
<p>---------------------------------------<br>
BUKATSU お問合わせ<br>
メールアドレス ：bukatsu-offer@bukatsu.work<br>
---------------------------------------
</p>