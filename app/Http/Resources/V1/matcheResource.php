<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class matcheResource extends JsonResource
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
            'advName' => $this->adv_Name,
            'type' => $this->type,
            'league' =>$this->league,
            'matcheDate' => $this->matche_Date
        ];
    }
}
