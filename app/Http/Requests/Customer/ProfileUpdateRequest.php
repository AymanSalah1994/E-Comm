<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric|digits:11|unique:users,phone,' . $this->user()->id,
            'email' => "required|email|unique:users,email," . $this->user()->id,
            // Several Hours To Fix this Bug
            // actually it is working But the user itself did not pass
            // So we used This [ ,".$this->user()->id ]
        ];
    }

    public function handleRequest()
    {
        $allRequestedData  = $this->validated();
        return $allRequestedData;
    }

    public function messages()
    {
        return [
            // field.validation_Rule => 'msg '
            // 'email.email' =>'The Email you Entered is NOT valid!' ,
            'digits' => 'Please Enter a Valid Numbber' ,
            '*.*' => 'Data Entered is Not Proper data !'
        ];
    }
}
