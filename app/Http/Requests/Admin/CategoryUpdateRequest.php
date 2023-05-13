<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class CategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'nullable',
            'popular' => 'nullable',
            'keywords' => 'nullable|string|max:400',
            'category_picture' => 'nullable|mimes:png,jpeg,bmp,jpg'
        ];
    }

    public function handleRequest()
    {
        $allRequestData = $this->validated();
        if ($this->hasFile('category_picture')) {
            $response = cloudinary()
                ->upload($this->file('category_picture')->getRealPath(), [
                    'upload_preset' => 'ml_default'
                ])
                ->getSecurePath();
            $fileURL = $response;
            // The Cloudinary URL 
            $allRequestData['category_picture'] = $fileURL;
        }
        $allRequestData['status'] = ($this->status == 'on' ? '1' : '0');
        $allRequestData['popular'] = ($this->popular == 'on' ? '1' : '0');
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
