<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->ouser_id,
            'employee_name' => $this->ouser_first_name . ' ' . $this->ouser_last_name,
            'email'         => $this->ouser_email,
            'department_id' => $this->ouser_department_id
        ];
    }
}