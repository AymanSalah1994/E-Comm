<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

use Cloudinary\Cloudinary as  Cloudinary;
use Cloudinary\Tag\ImageTag;
use Cloudinary\Transformation\Resize;

class CategoryRequest extends FormRequest
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
        $cloudinary = new Cloudinary(
            [
                'cloud' => [
                    'cloud_name' => env('CLOUD_NAME'),
                    'api_key'    => env('API_KEY'),
                    'api_secret' => env('API_SECRET'),
                ],
            ]
        );

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

    // public function attributes()
    // {
    //     return [
    //         'company_id' => 'Company' ,
    //         // instead of the Company id is Required , the error Message will be
    //         // the Company Field is Required
    //         // 'email' => 'email address'
    //     ] ;
    // }
    public function messages()
    {
        return [
            // field.validation_Rule => 'msg '
            //             'email.email' =>'The Email you Entered is NOT valid!' ,
            '*.*' => trans('This Field Can Has a Problem')
        ];
    }
}
