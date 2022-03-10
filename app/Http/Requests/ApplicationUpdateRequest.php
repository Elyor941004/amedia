<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationUpdateRequest extends FormRequest
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
            'theme'=>'required|string',
            'message'=>'required|string',
            'name'=>'required|string',
            'email'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'theme.required'=>'ВВедите тема',
            'theme.string'=>'ВВедите текст',
            'message.required'=>'ВВедите Собщения',
            'message.string'=>'ВВедите текст',
            'name.required'=>'ВВедите имя',
            'name.string'=>'ВВедите текст',
            'email.required'=>'ВВедите емаил',
            'email.string'=>'ВВедите текст',
        ];
    }
}
