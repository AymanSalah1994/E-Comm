<?php

namespace App\Http\Requests\Customer;

use App\Models\Order;
use App\Models\User;
use Faker\Extension\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AddCartItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'product_quantity' => 'required|numeric|max:10'
        ];
    }
    public function handleRequest()
    {
        $allRequestData = $this->validated();
        $user = User::find($this->user()->id);
        $allRequestData['user_id'] = $user->id;
        if ($user->orders->where('status', '0')->first()) {
            $active_order = $user->orders->where('status', '0')->first();
        } else {
            $newOrder = [
                'user_id' => $user->id,
                // 'total' => '0' ,
                'tracking_id' => Str::random(7)
            ];
            $active_order = Order::create($newOrder);
        }
        $allRequestData['order_id'] = $active_order->id;
        $allRequestData['quantity'] = $this->product_quantity;
        $allRequestData['product_id'] = $this->product_id;
        return $allRequestData;
    }

    // public function updateTotalOrder($order_id)
    // {
    //     $or = Order::find($order_id);
    //     $total = 0;
    //     foreach ($or->cartItems->all() as $orderItem) {
    //         $total = $total + ($orderItem->product->selling_price * $orderItem->quantity);
    //     }
    //     Order::where('id', $order_id)->update(['total' => $total]);
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
