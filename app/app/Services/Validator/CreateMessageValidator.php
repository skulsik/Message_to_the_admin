<?php

namespace App\Services\Validator;

use Illuminate\Support\Facades\Validator;

class CreateMessageValidator
{
    public function __construct($request)
    {
        $this->request = $request;
        // Правила проверки
        $this->rules=array(
            'name' => "required|string|max:33",
            'phone' => "required|string|min:5|max:16",
            'email' => "required|string|max:50|email:strict",
        );

        // Кастомные сообщения
        $this->messages = [
            'required' => 'Поле не должно быть пустым.',
            'string' => 'Поле типа string.',
            'name.max' => 'В поле (Имя), можно ввести не более 33 символов.',
            'phone.min' => 'Номер телефона, не может быть меньше 5 символов.',
            'phone.max' => 'Номер телефона, не может быть больше 16 символов.',
            'email.max' => 'В поле (email), можно ввести не более 50 символов',
            'email.email' => 'Вы неправильно ввели адрес электронной почты.'
        ];
    }

    public function run_validator()
    {
        // Валидация
        $this->validator = Validator::make($this->request->all(),$this->rules, $this->messages);
    }

    public function error_validator()
    {
        // Если ошибки, возвращает их
        if($this->validator->fails())
        {
            return $this->validator->errors();
        }
    }
}
