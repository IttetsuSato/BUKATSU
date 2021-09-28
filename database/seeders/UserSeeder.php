<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name'      => '管理者A',
          'katakana'  => 'カンリシャA',
          'attribute' => 'administrator',
          'email'     => '1010bukatsu.info@gmail.com',
          'password'       => Hash::make('atumori_bukatsu'),
          'created_at'     => now(),
          'updated_at'     => now(),
      ]);

      DB::table('users')->insert([
          'name'      => '管理者B',
          'katakana'  => 'カンリシャB',
          'attribute' => 'administrator',
          'email'     => 'ittetsusato@gmail.com',
          'password'       => Hash::make('ittetsu_bukatsu'),
          'created_at'     => now(),
          'updated_at'     => now(),
      ]);
      
      $sports = ['ウエイトリフティング','射撃','サッカー','自転車','水泳','ソフトボール','卓球','テニス','ソフトテニス','バスケットボール','バトン','バドミントン','バレーボール','ボクシング','ホッケー','野球','ラクロス','ラグビー','陸上','レスリング','体操','アーチェリー','フェンシング','ダンス','シンクロナイズドスイミング','スキー','アイススケート','スノーボード','カーリング','ボブスレー','空手','弓道','剣道','柔道','相撲','薙刀','馬術'];
      $liberal_arts = ['放送文化','サイエンス','美術','書道','吹奏楽','茶道','合唱','演劇','新聞','文芸','将棋','バンド'];
      for($i = 1; $i<= count($sports) + count($liberal_arts); $i++){
        DB::table('users')->insert([
          'name'      => 'テストユーザー'.$i,
          'katakana'  => 'テストユーザー'.$i,
          'attribute' => 'civilian',
          'city_id'   => mt_rand(1,179),
          'profile'   => '私はテストユーザーです',
          'birthday'  => '2000-05-01',
          'sex'       => 'man',
          'career'    => mt_rand(1, 30),
          'email'     => 'civilian'.$i.'@test.com',
          'password'  => Hash::make('12345678'),
          'created_at'     => now(),
          'updated_at'     => now(),
        ]);

        DB::table('users')->insert([
            'name'      => 'テスト学園',
            'katakana'  => 'テストガクエン'.$i,
            'attribute' => 'school',
            'city_id'   => mt_rand(1,179),
            'profile'   => '私はテスト学園です。',
            'email'     => 'school'.$i.'@test.com',
            'password'  => Hash::make('12345678'),
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
      }

    }
}
