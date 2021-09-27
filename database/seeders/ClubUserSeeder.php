<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Club;

class ClubUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 0; $i < 100; $i++){

        // clubsとusersテーブルのidカラムをランダムに並び替え、先頭の値を取得
        $set_club_id = Club::select('id')->orderByRaw("RAND()")->first()->id;
        $set_user_id = User::select('id')->orderByRaw("RAND()")->first()->id;

        // クエリビルダを利用し、上記のモデルから取得した値が、現在までの複合主キーと重複するかを確認
        $club_user = DB::table('club_user')
                        ->where([
                            ['club_id', '=', $set_club_id],
                            ['user_id', '=', $set_user_id]
                        ])->get();

        // 上記のクエリビルダで取得したコレクションが空の場合、外部キーに上記のモデルから取得した値をセット
        if($club_user->isEmpty()){
            DB::table('club_user')->insert(
                [
                    'club_id' => $set_club_id,
                    'user_id' => $set_user_id,
                ]
            );
        }else{
            $i--;
        }
    }
  }
}
