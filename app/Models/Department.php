<?php

namespace App\Models;

use App\Http\Resources\DepartmentResource;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 */
class Department extends Model
{
    protected $primaryKey = 'id';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'title',
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    private static function getColumns()
    {
        return [
            "id",
            "title",
        ];
    }

    public static function getDepartments()
    {
        $columns = self::getColumns();

        $models = Department::select($columns)
            ->orderBy('id')
            ->get();

        return DepartmentResource::collection($models);
    }
}
