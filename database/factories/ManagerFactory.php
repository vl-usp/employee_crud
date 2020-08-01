<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->state(Employee::class, 'manager', function (Faker $faker) {
    return [
        "department_id" => $faker->unique()->numberBetween(1, 4),
        "position_id" => 2,
        "boss_id" => 1,
    ];
});
