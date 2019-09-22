<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'title'      => 'required',
            'content'    => 'required',
            'tag'        => 'required',
            'seeinstore' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => 'You must enter a title.',
            'content.required' => 'You should have content.',
            'tag.required'     => 'Can you tell me something',                
        ];
    }
}
