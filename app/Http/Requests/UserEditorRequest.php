<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditorRequest extends FormRequest
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
            'name'      =>    'required',
            'email'     =>    'required',
            'points'    =>    'required|digits:6',
            'password'  =>    'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'You must enter an name.', 
            'email.required'         => 'Things need to be Email.',            
            'points.numeric'         => 'This price mus be number.', 
            'points.required'        => 'You must enter this Points', 
            'points.digits'          => 'The point are max 0-999,999',             
        ];
    }
}
