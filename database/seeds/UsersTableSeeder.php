<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('username', 'admin')->get();
        if (count($user) == 0) {
            DB::table('users')->insert([
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@sunnyshop.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
