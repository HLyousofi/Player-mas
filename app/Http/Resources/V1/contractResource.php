<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class contractResource extends JsonResource
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
            'beneficiaryId' => $this->beneficiary_Id,
            'teamId' => $this->team_Id,
            'startDate' => $this->start_Date,
            'endDate' => $this->end_Date,
            'salary' => $this->salary,
            'type' => $this->type,
            'beneficiaryType' => $this->beneficiary_Type
        ];
    }
}
