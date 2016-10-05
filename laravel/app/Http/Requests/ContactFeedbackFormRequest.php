<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactFeedbackFormRequest extends Request
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
            'fio' => 'required|regex:/^[A-Za-zА-Яа-яЁё\s]*$/',
            'Telephone' =>'required|regex:/^\+38\(\d{3}\)-\d{3}-\d{2}-\d{2}$/',
            'email' =>'required|email',
            'messagetext'=>'required|min:10|regex:/^[A-Za-zА-Яа-яЁё0-9\s\.\,\!\?\:]*$/',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Заполните пожалуста все поля!',
            'Telephone.regex' => 'Внимательнее при заполнении поля Телефон!',
            'email.email' => 'введите правильный email',
            'messagetext' => 'Введите текст сообщения длиной неменее 10 знаков!',
            'g-recaptcha-response' => '!!!!!!!!!!!!! Бот !!!!!!!!!'

        ];
    }
}
