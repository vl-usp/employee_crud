<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function positions()
    {
        return $this->belongsToMany(Employee::class, 'employee_position');
    }
}
