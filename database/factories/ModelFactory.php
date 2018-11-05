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
    ];
});

$factory->define(App\Igpass::class, function (Faker\Generator $faker) {

    return [
        'igp_date' => $faker->date('Y-m-d'),
        'igp_time' => $faker->time(),
        'invart_type' => $faker->words(),
        'party_name' => $faker->words(),
        'plant_name' => $faker->words(),
        'bowser_no' => $faker->words(),
        'driver_name' => $faker->name('male'),
        'driver_cell' => $faker->phoneNumber,
        'load_weight' => $faker->randomFloat(),
        'offload_weight' => $faker->randomFloat(),
        'remarks' => $faker->sentence($nbWords = 3)
    ];
});
