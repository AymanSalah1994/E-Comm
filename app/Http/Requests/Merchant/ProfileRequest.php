<?php

namespace App\Http\Requests\Merchant;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProfileRequest extends FormRequest
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
            'bio' => 'nullable|string|max:255',
            'fb_link' => 'nullable|url|max:255',
            'youtube_vid' => 'nullable|url|max:255',
            'profile_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
        ];
    }

    public function handleRequest()
    {
        $allRequestData = $this->validated();
        if ($this->hasFile('profile_picture')) {
            $response = cloudinary()
                ->upload($this->file('profile_picture')->getRealPath(), [
                    'upload_preset' => 'ml_default'
                ])
                ->getSecurePath();
            $fileURL = $response;
            // The Cloudinary URL 
            $allRequestData['profile_picture'] = $fileURL;
        }
        return $allRequestData;
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
