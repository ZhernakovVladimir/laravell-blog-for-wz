<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCategoryRequest extends Request
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
            'name'=>'required',// Название
            'url'=>'required|unique:categories',// URL
            'subscibtion'=>'required',// Описание
            'published'=>'boolean',// Публикация
            'published_at'=>'required|date',//Дата публикации
            //
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Вы не ввели название рубрики!',
            'url.required' => 'Вы не ввели адрес рубрики!',
            'url.unique' => 'этот URL уже занят',
            'subscibtion.required' => 'Рубрика нуждается в описании!',
            'published_at.required' => 'Введите дату публикации!',

        ];
    }
}
