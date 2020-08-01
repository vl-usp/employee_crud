<?php

namespace App\Models;

use App\Http\Resources\PositionResource;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 */
class Position extends Model
{
    protected $primaryKey = 'id';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'title'
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

    public static function getPositions()
    {
        $columns = self::getColumns();

        $models = Position::select($columns)
            ->orderBy('id')
            ->get();

        return PositionResource::collection($models);
    }
}
