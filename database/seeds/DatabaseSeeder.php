<?php

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Данная функция создает связи в таблице employee_position (M:M)
    * Сотрудник с id = 1 - Директор
    * Сотрудники с id от 2 до 5 - Руководители проектов
    * Остальные сотрудники - Программисты, дизайнеры и тестировщики
     */
    private function setPositions()
    {
        $director = Position::where('id', 1)->get();
        $manager = Position::where('id', 2)->get();
        $workerPositions = Position::where('id', '!=', 1)->where('id', '!=', 2)->get();

        Employee::all()->each(function ($employee) use ($director, $manager, $workerPositions) {
            if($employee->id === 1) {
                $employee->positions()->attach($director);
            } else if($employee->id >= 2 && $employee->id <= 5) {
                $employee->positions()->attach($manager);
            } else {
                $employee->positions()->attach($workerPositions);
            }
        });
        $this->command->info("Positions were set up");
    }


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(EmployeeSeeder::class);

        $this->setPositions();
    }
}
