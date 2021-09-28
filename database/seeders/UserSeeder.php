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
      
      for($i = 1; $i<= 100; $i++){
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
            'name'      => 'テスト第'.$i.'学園',
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
