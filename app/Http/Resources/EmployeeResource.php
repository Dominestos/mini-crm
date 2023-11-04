<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'note' => $this->note,
            'company' => [
                'id' => $this->company->id,
                'name' => $this->company->name,
            ],
            'messages' => [
                'store' => $this->when($request->method() === 'POST', $this->first_name . ' ' . $this->second_name . '. ' . __('Employee was successfully created!')),
                'update' => $this->when($request->method() === 'PATCH', $this->first_name . ' ' . $this->second_name . '. ' . __('Employee was successfully edited!')),
        ]
    ];
    }
}
