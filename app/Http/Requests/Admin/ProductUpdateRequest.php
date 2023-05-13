<?php

namespace App\Http\Requests\Admin;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProductUpdateRequest extends FormRequest
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
            'status' => 'nullable',
            'trending' => 'nullable',
            'refundable' => 'nullable',
            'youtube_vid' => 'nullable|url',
            'keywords' => 'nullable|string|max:255',
            'product_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'secondary_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function handleRequest()
    {
        $product = Product::find($this->product->id);
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
        return $allRequestData;
        // Save Data Here Then Send Product to Below MEthod
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
