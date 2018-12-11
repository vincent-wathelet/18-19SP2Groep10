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
        'admin' => 0,
        'banned' => 0,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Categorie::class, function (Faker\Generator $faker) {


    return [
        'naam' => $faker->jobTitle,
    ];
});

$factory->define(App\Categorie::class, function (Faker\Generator $faker) {


    return [
        'naam' => $faker->jobTitle,
    ];
});
$factory->define(App\Lokaal::class, function (Faker\Generator $faker) {


    return [
        'gebouw' => $faker->randomLetter,
        'lokaal' => $faker->numberBetween(0,209)
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {

    return [
        'categorieId' => $faker->numberBetween(1,4),
        'naam' => $faker->title,
        'lokaalId' => $faker->numberBetween(1,20),
        'maxInschrijvingen' => $faker->numberBetween(5,80),
        'begindate' => $faker->dateTimeBetween('now','+10day'),
        'enddate' => $faker->dateTimeBetween('+10day','+30day'),
        'autoaccept' => $faker->numberBetween(0,1),
        'description' => $faker->text,
        'hidden' => 0
    ];
});