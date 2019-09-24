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
            'cover'               => 'nullable|image ',
            'item_price'          => 'required|numeric',
            'item_command'        => 'required',
            'item_discount_price' => 'nullable|numeric',
            
        ];
    }

    public function messages()
    {
        return [
            'item_name.required'          => 'You must enter an item name.', 
            'item_desc.required'          => 'You must to give a detail for this item.',  
            'cover.required'              => 'The product need a cover.', 
            'item_price.numeric'          => 'Price must be number.', 
            'item_price.required'         => 'You must enter a price.',
            'item_command.required'       => 'You must set an some command.',
            'item_discount_price.numeric' => 'Discount price must be number.',
                
        ];
    }
}
