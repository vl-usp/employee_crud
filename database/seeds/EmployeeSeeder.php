<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    private function setDirector()
    {
        Employee::create([
            "fio" => "Лебедев Антон Викторович",
            "phone" => "+7-919-700-XX-XX"
        ]);
        $this->command->info("Director was created");
    }

    private function setManager()
    {
        factory(Employee::class, 4)->state('manager')->create();
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
        $this->setEmployee(40);
    }
}
