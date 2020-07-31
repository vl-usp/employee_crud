<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class,function (Faker $faker) {
    $fio = $faker->name;

    return [
        "fio" => $fio,
        "phone" => "+7-919-700-XX-XX",
        "department_id" => rand(1,4),
        "boss_id" => rand(2,5),
    ];
});
