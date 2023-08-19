<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractRequest extends FormRequest
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
                'beneficiaryId' => ['required'],
                'teamId' => ['required'],
                'startDate' => ['required'],
                'endDate' => ['required'],
                'salary' => ['required'],
                'type' => ['required'],
                'beneficiaryType' => ['required']
            ];
            
        }else {
            return [
                'beneficiaryId' => ['sometimes', 'required'],
                'teamId' => ['sometimes', 'required'],
                'startDate' => ['sometimes', 'required'],
                'endDate' => ['sometimes', 'required'],
                'salary' => ['sometimes', 'required'],
                'type' => ['sometimes', 'required'],
                'beneficiaryType' => ['sometimes', 'required']


            ];

        }
    }

    protected function prepareForValidation(){
        $this->merge([
           'beneficiary_Id' => $this->beneficiaryId,
            'team_Id' => $this->teamId,
            'start_Date' => $this->startDate,
            'end_Date' => $this->endDate,
            'beneficiary_Type' => $this->beneficiaryType
        ]);
    }
}
