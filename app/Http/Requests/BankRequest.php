<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
    //    dd(('bankName.*'));
      
        return [
            'bankName.*' => 'required|string|max:255',
            'grade.*' => 'required|string|max:1',
        ];
    }

    public function messages()
{
    return [
        'bankName.*.required' => 'Please enter the bank name.',
        'bankName.*.string' => 'The bank name must be a string.',
        'bankName.*.max' => 'The bank name may not be greater than :max characters.',
        'grade.*.required' => 'Please Enter the grade.',
        'grade.*.string' => 'The grade must be a string.',
        'grade.*.max' => 'The grade may not be greater than :max characters.',
    ];
}
}
