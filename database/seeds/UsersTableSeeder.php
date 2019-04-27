<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

             'name'      => str_random(10),
             'email'     => str_random(10).'@yahoo.com',
             'password'  => bcrypt('secret'),
             'is_active' => 0,
             'role_id'   => 1
        ]);
    }
}
