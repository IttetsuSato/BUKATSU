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
          'name' => '志度薄琉',
          'attribute' => 'civilian',
          'profile' => 'This is civilian',
          'email' => 'civilian@test.com',
          'password' => Hash::make('12345678'),
          'created_at'     => now(),
          'updated_at'     => now(),
      ]);
      DB::table('users')->insert([
          'name' => 'UA学園',
          'attribute' => 'school',
          'profile' => 'This is school',
          'email' => 'school@test.com',
          'password' => Hash::make('12345678'),
          'created_at'     => now(),
          'updated_at'     => now(),
      ]);

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
