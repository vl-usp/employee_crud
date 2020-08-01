<?php

namespace App\Models;

use App\Http\Resources\EmployeeResource;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string fio
 */
class Employee extends Model
{
    protected $primaryKey = 'id';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'fio',
        'phone',
        'department_id',
        'boss_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, "department_id", "id");
    }

    public function position()
    {
        return $this->belongsTo(Position::class, "position_id", "id");
    }

    public function boss()
    {
        return $this->belongsTo(Employee::class, 'boss_id', 'id');
    }

    private static function getColumns()
    {
        return [
            "id",
            "department_id",
            "boss_id",
            "position_id",
            "fio",
            "phone"
        ];
    }

    private static function getAllEmployees()
    {
        $columns = self::getColumns();

        $models = Employee::select($columns)
            ->with([
                'department',
                'position',
                'boss',
            ])
            ->orderBy('id');

        return $models;
    }

    public static function getEmployeesWithPaginate($perPage = 10)
    {
        $models = self::getAllEmployees()
            ->paginate($perPage);

        return EmployeeResource::collection($models);
    }

    public static function getEmployeesByDepartmentWithPaginate($department_id = null, $perPage = 10)
    {
        $models = self::getAllEmployees()
            ->where("department_id", $department_id)
            ->paginate($perPage);

        return EmployeeResource::collection($models);
    }
}
