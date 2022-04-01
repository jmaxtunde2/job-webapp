<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->delete();
        $users =
            [
                ['email' => 'admin@jobapp.com', 'names'=> 'Super Admin', 'phone' => '07065949211', 'level' => '6036', 'password' => bcrypt('123456')],
                ['email' => 'editor@jobapp.com', 'names'=> 'Editor', 'phone' => '07065949210', 'level' => '6032', 'password' => bcrypt('123456')],
                ['email' => 'user@jobapp.com', 'names'=> 'Job Seeker 1', 'phone' => '0706594923', 'level' => '6030', 'password' => bcrypt('123456')],
            ];

        foreach ($users as $user) {
            $user = \App\User::create($user);
            $user->save();
            
        }
    }
}
