<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
                'name' => ['required'],
                'position' => ['required'],
                'birthDay' => ['required'],
                'adress' => ['required'],
                'phone' => ['required'],
                'mail' => ['required', 'email'],
                'number' => ['required']

            ];
        }else {
            return [
                'teamId' => ['sometimes', 'required'],
                'name' => ['sometimes', 'required'],
                'position' => ['sometimes', 'required'],
                'birthDay' => ['sometimes', 'required'],
                'adress' => ['sometimes', 'required'],
                'phone' => ['sometimes', 'required'],
                'mail' => ['sometimes', 'required', 'email'],
                'number' => ['sometimes', 'required']

            ];

        }
    }

    protected function prepareForValidation(){
        if($this->teamId){
            $this->merge([
            'team_Id' => $this->teamId
            ]);
        }
        if($this->birthDay){
            $this->merge([
                'birth_day' => $this->birthDay
            ]);
        }
    }
}
