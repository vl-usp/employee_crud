<?php

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    private function createPosition($title)
    {
        Position::create([
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
        $positions = ["Директор", "Руководитель проектов", "Разработчик", "Тестировщик", "Дизайнер"];

        for($i = 0; $i < count($positions); $i++) {
            $this->createPosition($positions[$i]);
        }
    }
}
