<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        // dd(request()->all());
        return [
            'branchName.*' => 'required|string|max:255',
            'branchAddress.*' => 'required|string|max:255',
            'phone.*' => 'required|integer',
            'bank_id.*' => 'required|exists:banks,id',
        ];
    }
    
    public function messages()
    {
        // dd();
        return [
            'branchName.*.required' => 'Please Enter Branch Name.',
            'branchName.*.string' => 'The Branch Name must be string.',
            'branchName.*.max' => 'The field may not be greater than :max characters.',
            'branchAddress.*.required' => 'Branch Address field is required.',
            'branchAddress.*.string' => 'The field must be a string.',
            'branchAddress.*.max' => 'The field may not be greater than :max characters.',
            'phone.*.required' => 'Phone field is required.',
            'phone.*.integer' => 'The field must be an integer.',
            'bank_id.*.required' => 'Please select a bank.',
            'bank_id.*.exists' => 'Please select a bank.',
        ];
    }
    
}
