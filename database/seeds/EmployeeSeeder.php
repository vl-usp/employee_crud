<?php

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    private function setDirector()
    {
        factory(Employee::class)->state("director")->create();
        $this->command->info("Director was created");
    }

    private function getDepartmentCount()
    {
        return Department::all()->count();
    }

    private function setManager()
    {
        $count = $this->getDepartmentCount();
        factory(Employee::class, $count)->state("manager")->create();
        $this->command->info("Managers were created");
    }

    private function setEmployee($count)
    {
        factory(Employee::class, $count)->create();
        $this->command->info("The employee table is filled with $count entries");
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setDirector();
        $this->setManager();
        $this->setEmployee(20);
    }
}
