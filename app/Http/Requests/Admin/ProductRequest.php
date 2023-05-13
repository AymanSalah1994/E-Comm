<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'small_description' => 'nullable|string|max:255',
            'description' => 'required|string',
            'original_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'quantity' => 'nullable|numeric|min:0',
            'youtube_vid' => 'nullable|url',
            'status' => 'nullable',
            'trending' => 'nullable',
            'refundable' => 'nullable',
            'keywords' => 'nullable|string|max:255',
            'product_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'secondary_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function handleRequest()
    {
        $allRequestData = $this->validated();
        if ($this->hasFile('product_picture')) {
            $response = cloudinary()
                ->upload($this->file('product_picture')->getRealPath(), [
                    'upload_preset' => 'ml_default'
                ])
                ->getSecurePath();
            $fileURL = $response;
            // The Cloudinary URL 
            $allRequestData['product_picture'] = $fileURL;
        }
        if ($this->hasFile('secondary_picture')) {
            $response = cloudinary()
                ->upload($this->file('secondary_picture')->getRealPath(), [
                    'upload_preset' => 'ml_default'
                ])
                ->getSecurePath();
            $fileURL = $response;
            // The Cloudinary URL 
            $allRequestData['secondary_picture'] = $fileURL;
        }
        $allRequestData['status'] = ($this->status == 'on' ? '1' : '0');
        $allRequestData['trending'] = ($this->trending == 'on' ? '1' : '0');
        $allRequestData['refundable'] = ($this->refundable == 'on' ? '1' : '0');
        $allRequestData['user_id'] = $this->user()->id;
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
