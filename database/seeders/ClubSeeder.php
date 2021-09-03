<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class clubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      //デフォルトの体育会系/文系部活
      $sports = ['ウエイトリフティング','射撃','サッカー','自転車','水泳','ソフトボール','卓球','テニス','ソフトテニス','バスケットボール','バトン','バドミントン','バレーボール','ボクシング','ホッケー','野球','ラクロス','ラグビー','陸上','レスリング','体操','アーチェリー','フェンシング','ダンス','シンクロナイズドスイミング','スキー','アイススケート','スノーボード','カーリング','ボブスレー','空手','弓道','剣道','柔道','相撲','薙刀','馬術'];
      $liberal_arts = ['放送文化','サイエンス','美術','書道','吹奏楽','茶道','合唱','演劇','新聞','文芸','将棋','バンド'];

      for ($i = 0; $i < count($sports); $i++)
      {
        DB::table('clubs')->insert([
            'name' => $sports[$i],
            'attribute' => 'sports',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
      }
      for ($i = 0; $i < count($liberal_arts); $i++)
      {
        DB::table('clubs')->insert([
            'name' => $liberal_arts[$i],
            'attribute' => 'liberal_arts',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
      }
    }
}
