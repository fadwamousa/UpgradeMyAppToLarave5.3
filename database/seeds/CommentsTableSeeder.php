<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
          'author' => 'fadwa'.str_random(3),
          'email'  => str_random(5).'@gmail.com',
          'body'   => str_random(15),
          'is_active' => 1,
          'post_id'   => 2,
          'photo'     => 'image.jpg'
         ]);
    }
}
