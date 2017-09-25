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
    return [
        'username' => $faker->unique()->username,
        'owner_id' => '',
        'owner_type' => '',
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Agent::class, function (Faker\Generator $faker) {
    $profile = factory('App\Profile')->create();
    // $job = factory('App\Job')->create();

    return [
        'profile_id' => $profile->id,
        'job_id' => $faker->numberBetween(1, 5),
        'engaged_since' => Carbon\Carbon::now()->subYear($faker->numberBetween(1,10))
    ];
});

$factory->define(App\Job::class, function (Faker\Generator $faker) {
    return [
        'title' => '',
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Room::class, function (Faker\Generator $faker) {
    $room_type = factory(App\RoomType::class)->create();

    return [
        'code' => $faker->name,
        'room_type_id' => $room_type->id,
        'free' => true,
        'max_occupancy' => $faker->numberBetween(1, 5),
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\RoomType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstname,
        'base_price' => $faker->numberBetween(10, 99)*5,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Reservation::class, function (Faker\Generator $faker) {   
    $client = factory(App\Client::class)->create();
    $room = factory(App\Room::class)->create();

    $checkin = \Carbon\Carbon::today()->subDays(7);
    $checkout = $checkin->copy()->addDay($faker->numberBetween(0, 19));

    $total_price = ($room->type->base_price) * ($checkout->diffInDays($checkin) + 1);
    $payed = $faker->numberBetween(0, $total_price);

    return [
        'client_id' => $client->id,
        'room_id' => $room->id,
        'total_price' => $total_price,
        'paid' => $payed,
        'checkin' => $checkin,
        'checkout' => $checkout,
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    $profile = factory('App\Profile')->create();

    return [
        'profile_id' => $profile->id,
        'company' => $faker->company
    ];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'title' => $faker->title,
        'country' => $faker->country,
        // 'town' => $faker->town,
        'phone_number' => $faker->e164PhoneNumber
    ];
});