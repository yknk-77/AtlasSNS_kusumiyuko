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
                'password' => bcrypt('123123')
            ],
            [
                'username' => 'Atlas二郎',
                'mail' => 'atlas2@xxx.com',
                'password' => bcrypt('234234')
            ],
            [
                'username' => 'Atlas三郎',
                'mail' => 'atlas3@xxx.com',
                'password' => bcrypt('345345')
            ],
            [
                'username' => 'Atlas四郎',
                'mail' => 'atlas4@xxx.com',
                'password' => bcrypt('456456')
            ],
            [
                'username' => 'Atlas五郎',
                'mail' => 'atlas5@xxx.com',
                'password' => bcrypt('567567')
            ]
        ]);
    }
}
