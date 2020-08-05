<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("department_id")->index()->nullable();
            $table->unsignedBigInteger("position_id")->index();
            $table->unsignedBigInteger("boss_id")->index()->nullable();
            $table->string("fio", 50);
            $table->string("phone", 16);
            $table->timestamps();

            $table->foreign("department_id")->references("id")->on("departments");
            $table->foreign("position_id")->references("id")->on("positions");
            $table->foreign("boss_id")->references("id")->on("employees")
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
