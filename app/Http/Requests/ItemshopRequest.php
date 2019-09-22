<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemshopRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'item_name'           => 'required',
            'item_desc'           => 'required',
            'cover'               => 'required',
            'item_price'          => 'required|numeric',
            'item_discount_price' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'item_name.required'          => 'You must enter an item name.', 
            'item_desc.required'          => 'Things need to be priced.',  
            'cover.required'              => 'You should put the product image.', 
            'item_price.numeric'          => 'This price mus be number.', 
            'item_price.required'         => 'Plase enter this price',
            'item_discount_price.numeric' => 'item discount price can be empty.',    
        ];
    }
}
