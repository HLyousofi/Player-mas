<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatcheRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'teamId' => ['required'],
            'advName' => ['required'],
            'matcheDate' => ['required'],
            'league' => ['required'],
            'type' => ['required'],
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
           'team_Id' => $this->teamId,
            'adv_Name' => $this->advName,
            'matche_Date' => $this->matcheDate
        ]);
    }
}
