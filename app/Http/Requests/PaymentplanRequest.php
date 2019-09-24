<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentplanRequest extends FormRequest
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
            'provider'      => 'required',
            'title'         => 'required',
            'price'         => 'required|numeric',
            'points_amount' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'provider.required'      =>' You must enter a name provider',
            'title.required'         =>' You must enter a title',
            'price.required'         =>' You must enter the price ',
            'price.numeric'          =>' The price must be number ',
            'points_amount.required' =>' You must enter the PointsAmount ',           
            'points_amount.numeric'  =>' The Point must be number',
        ];
    }
}
