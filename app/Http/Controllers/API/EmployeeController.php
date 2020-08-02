<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null $department_id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index($department_id = null)
    {
        if($department_id === null) {
            return Employee::getEmployeesWithPaginate();
        } else {
            return Employee::getEmployeesByDepartmentWithPaginate($department_id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        Employee::create($request->all());
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $item = Employee::find($id);
        $item->update($request->all());
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return;
    }
}
