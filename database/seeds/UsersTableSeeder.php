<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期ユーザーのデータ
        DB::table('users')->insert([
            [
                'username' => 'Atlas一郎',
                'mail' => 'atlas1@xxx.com',
                'password' => bcrypt('12345678')
            ],
            [
                'username' => 'Atlas二郎',
                'mail' => 'atlas2@xxx.com',
                'password' => bcrypt('12345678')
            ],
            [
                'username' => 'Atlas三郎',
                'mail' => 'atlas3@xxx.com',
                'password' => bcrypt('12345678')
            ],
            [
                'username' => 'Atlas四郎',
                'mail' => 'atlas4@xxx.com',
                'password' => bcrypt('12345678')
            ],
            [
                'username' => 'Atlas五郎',
                'mail' => 'atlas5@xxx.com',
                'password' => bcrypt('12345678')
            ],
            [
                'username' => 'Atlas六郎',
                'mail' => 'atlas6@xxx.com',
                'password' => bcrypt('12345678')
            ],
            [
                'username' => 'Atlas七海',
                'mail' => 'atlas7@xxx.com',
                'password' => bcrypt('12345678')
            ]
        ]);
    }
}
