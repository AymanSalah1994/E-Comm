<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // 'search_word' =>'' ,
            // 'minimum_price' =>'' ,
            // 'maximum_price' =>'' ,
            // 'category' =>'' ,
            // 'merchant' =>'' ,
            // ''
        ];
    }
    public function messages()
    {
        return [
            // field.validation_Rule => 'msg '
            //             'email.email' =>'The Email you Entered is NOT valid!' ,
            '*.*' => trans('This Field Can Has a Problem')
        ];
    }
}
