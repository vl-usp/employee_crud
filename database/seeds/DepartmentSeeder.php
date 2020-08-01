<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    private function createDepartment($title)
    {
        Department::create([
            "title" => $title
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ["Первый", "Второй", "Третий", "Четвертый"];
        for($i = 0; $i < count($departments); $i++)
        {
            $this->createDepartment($departments[$i]);
        }
    }
}
