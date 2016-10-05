<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTagRequest extends Request
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
            'name'=>'required',
            'url'=>'required|unique:tags1,url',         
            'published'=>'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Вы не ввели название тега!',
            'url.required' => 'Вы не ввели адрес тега!',
            'url.unique' => 'этот URL уже занят',
            'published' => 'Введите дату публикации!',

        ];
    }
}
