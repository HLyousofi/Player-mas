<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class staffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'teamId' => $this->team_Id,
            'name' => $this->name,
            'adress' => $this->adress,
            'phone' => $this->phone,
            'mail' => $this->mail,
            'role' => $this->role
        ];
    }
}
