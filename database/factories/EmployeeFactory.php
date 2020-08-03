<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use App\Models\Position;
use Faker\Generator as Faker;

$factory->define(Employee::class,function (Faker $faker) {
    $fio = $faker->name;
    $boss_id = rand(2,5);
    $department_id = Employee::select('department_id')->where('id', $boss_id)->get()->pluck('department_id')->first();
    $position_id = rand(3, Position::all()->count());
    return [
        "fio" => $fio,
        "phone" => "+7-919-700-XX-XX",
        "department_id" => $department_id,
        "boss_id" => $boss_id,
        "position_id" => $position_id,
    ];
});
