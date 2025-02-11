<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'basic_info' => [
               'first_name' => $this->basicInfo->first_name,
                'last_name' => $this->basicInfo->last_name,
                'full_name' => $this->basicInfo->first_name." ".$this->basicInfo->last_name,
                'gender' => $this->basicInfo->gender,
                'birth_date' => $this->basicInfo->birth_date,
            ],
            'contact_info' => [
                'phone' => $this->contactInfo->phone ?? null,
                'address' => $this->contactInfo->address ?? null,
                'social_links' => $this->contactInfo->social_links ?? null,
                'website' => $this->contactInfo->website ?? null,
            ],
        ];
    }
}