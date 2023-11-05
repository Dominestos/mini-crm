<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
            'logo' => $this->logo,
            'note' => $this->note,
            'messages' => [
                'store' => $this->when($request->method() === 'POST', $this->name . '. ' . __('Company was successfully created!')),
                'update' => $this->when($request->method() === 'PATCH', $this->name . '. ' . __('Company was successfully edited!')),
            ]
        ];
    }
}
