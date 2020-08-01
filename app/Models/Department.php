<?php

namespace App\Models;

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
}
