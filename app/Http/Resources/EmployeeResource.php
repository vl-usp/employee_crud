<?php

namespace App\Http\Resources;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int id
 * @property string fio
 * @property string phone
 * @property Department department
 * @property Position position
 * @property Employee boss
 */
class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "fio" => $this->fio,
            "phone" => $this->phone,
            "department" => [
                "id" => $this->department["id"],
                "title" => $this->department["title"],
            ],
            "position" => $this->position["title"],
            "boss" => $this->boss["fio"],
        ];
    }
}
