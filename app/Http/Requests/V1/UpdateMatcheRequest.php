<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UpdateMatcheRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return true;
        $user = $this->user();
        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
       

        $method = $this->method();
        
        if($method == 'PUT')
        {
            return [
                'teamId' => ['required'],
                'advName' => ['required'],
                'matcheDate' => ['required'],
                'league' => ['required'],
                'type' => ['required'],
            ];
            
        }else {
            return [
                'teamId' => ['sometimes', 'required'],
                'advName' => ['sometimes', 'required'],
                'matcheDate' => ['sometimes', 'required'],
                'league' => ['sometimes', 'required'],
                'type' => ['sometimes', 'required'],
            ];

        }
    }

    protected function prepareForValidation(){
        $this->merge([
           'team_Id' => $this->teamId,
            'adv_Name' => $this->advName,
            'matche_Date' => $this->matcheDate
        ]);
    }
}
