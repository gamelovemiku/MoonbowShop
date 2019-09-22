<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'hostname'         => 'required',
            'hostname_port'    => 'required',
            'rcon_port'        => 'required',
            'con_password'     => 'required',
            'website_name'     => 'required',
            'website_desc'     => 'required',

        ];
    }

    public function messages()
    {
        return [
            'hostname.required'     =>'Hostname Can\'t be blank',
            'hostname_port.required'=>'Hostname port Can\'t be blank',
            'rcon_port.required'    =>'RCON port Can\'t be blank',
            'con_password.required' =>'RCON plassword Can\'t be blank',
            'website_name.required' =>'You should have a website name ',
            'website_desc.required' =>'And users will know what your website is doing !!',
        ];
    }
}
