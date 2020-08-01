<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Faker\Generator as Faker;

$factory->define(Employee::class,function (Faker $faker) {
    $fio = $faker->name;
    $department = rand(1, Department::all()->count());
//    $boss = Employee::select("position_id")->with(["position.title"])->where("position", "Руководитель проектов");
    $position = rand(3, Position::all()->count());
    return [
        "fio" => $fio,
        "phone" => "+7-919-700-XX-XX",
        "department_id" => $department,
        "boss_id" => rand(2,5),
        "position_id" => $position,
    ];
});
