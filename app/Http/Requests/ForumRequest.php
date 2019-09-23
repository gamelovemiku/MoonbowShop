<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForumRequest extends FormRequest
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
            'category_name' =>'required',
            'description'   =>'required',     
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' =>'ํYou must enter a Title',
            'description.required'   =>'Tell us your story', 
        ];
    }
}
