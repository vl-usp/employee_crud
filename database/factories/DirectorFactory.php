<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->state(Employee::class, 'director',function (Faker $faker) {
    return [
        "department_id" => null,
        "boss_id" => null,
        "position_id" => 1,
    ];
});
