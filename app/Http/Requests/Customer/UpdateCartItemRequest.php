<?php

namespace App\Http\Requests\Customer;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCartItemRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function updateTotalOrder($order_id)
    {

        $or = Order::find($order_id);
        $total = 0;
        foreach ($or->cartItems->all() as $orderItem) {
            $total = $total + ($orderItem->product->selling_price * $orderItem->quantity);
        }
        Order::where('id', $order_id)->update(['total' => $total]);
    }


    public function messages()
    {
        return [
            '*' => 'A message is required',
        ];
    }
}
