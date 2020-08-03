<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\StructureResource
     */
    public function index()
    {
        return Employee::getStructure();
    }
}
