<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForumPostRequest extends FormRequest
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
            'category'      =>'required',
            'topic'         =>'required',
            'content'       =>'required',
            'is_published'  =>'nullable',
        ];
    }

    public function messages()
    {
        return [
            'category.required'     =>'จำเป็นต้องระบุหมวดหมู่ของPost',
            'topic.required'        =>'หัวข้อไม่สามารถเว้นว่างได้',
            'content.required'      =>'เนื้อหาไม่สามารถปล่อยว่างได้',
            
        ];
    }
}
