<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateArticleRequest extends Request
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
            'url'=>'required|unique:articles,url,'.$this->articles ,// URL
            'subscibtion'=>'required',// Описание
            'category_id'=>'required|exists:categories,id',// ->Категория
            'published'=>'required|boolean',// Публикация
            'published_at'=>'required|date',//Дата публикации
            'anons' =>'required'// Анонс поста
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
            'category_id.required' =>'Выберите пожалуста категорию',
            'category_id.exists' => 'Выберите категорию'
        ];
    }
}
