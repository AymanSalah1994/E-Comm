<?php

namespace App\Http\Requests\Merchant;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class UpdateProductRequest extends FormRequest
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
            'refundable' => 'nullable',
            'keywords' => 'nullable|string|max:255',
            'product_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'secondary_picture' => 'nullable|mimes:png,jpeg,bmp,jpg',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function handleRequest()
    {
        $product = Product::where('user_id', $this->user()->id)->where('slug', $this->product_id)->first();
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
        $allRequestData['refundable'] = ($this->refundable == 'on' ? '1' : '0');
        $product->update($allRequestData);
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
