<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractRequest extends FormRequest
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
            'beneficiary_Id' => ['required'],
            'start_Date' => ['required'],
            'end_Date' => ['required'],
            'salary' => ['required'],
            'type' => ['required'],
            'beneficiary_Type' => ['required']
        ];
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
