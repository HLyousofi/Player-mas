<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
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
            'role' => ['required'],
            'adress' => ['required'],
            'phone' => ['required'],
            'mail' => ['required', 'email']
            ];
        }else {
            return [
                'teamId' => ['sometimes', 'required'],
                'name' => ['sometimes', 'required'],
                'role' => ['sometimes', 'required'],
                'adress' => ['sometimes', 'required'],
                'phone' => ['sometimes', 'required'],
                'mail' => ['sometimes', 'required', 'email']
            ];

        }
        
    }
}