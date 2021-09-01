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
      // DB::table('users')->insert([
      //     'name' => Str::random(10),
      //     'attribute' => 'school',
      //     'email' => Str::random(10).'@gmail.com',
      //     'password' => Hash::make('password'),
      // ]);

      DB::table('users')->insert([
          'name' => 'test',
          'attribute'=> 'administrator',
          'email'=> 'test@test.com',
          'password'       => Hash::make('12345678'),
          'created_at'     => now(),
          'updated_at'     => now(),
      ]);
    }
}
