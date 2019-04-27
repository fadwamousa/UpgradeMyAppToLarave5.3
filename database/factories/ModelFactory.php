<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role_id' => $faker->numberBetween(1,3)
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'category_id' => $faker->numberBetween(1,10),
        'photo_id'    => 1,
        'title'       => $faker->sentence(7,11),
        'body'        => $faker->paragraphs(rand(5,10),true),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->randomElement(['Admin','Moderator','author'])
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->randomElement(['PHP','CSS','LARAVEL','OOP'])
    ];
});


$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'file' => 'placeholder.jpg'
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    static $password;
    return [
      'post_id'     => $faker->numberBetween(1,10),
      'is_active'   =>  1,
      'author'      => $faker->name,
      'body'        => $faker->paragraphs(1,true),
      'email'       => $faker->safeEmail,
      'photo'       => 'placeholder.jpg'
    ];
});


$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    static $password;
    return [
      'comment_id' => $faker->numberBetween(1,10),
      'is_active'   =>  1,
      'author'      => $faker->name,
      'body'        => $faker->paragraphs(1,true),
      'email'       => $faker->safeEmail,
      'photo'       => 'placeholder.jpg'
    ];
});
