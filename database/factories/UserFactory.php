<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->word(3),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('12345'),
        'phone' => '24234324',
        'celphone' => '1312321',
        'nit' => '123123213',
        'address' => $faker->sentence(10),
        'rol' => 1,
        'confirmed' => true,
        'confirmation_code' => 'seeker09',
        'gender' => true,
        'dui' => '',
        'nrm' => ' ',
        'specialty' => '',
        'remember_token' => str_random(10),
    ];
});
