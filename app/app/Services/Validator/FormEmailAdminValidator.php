<?php

namespace App\Services\Validator;

use Illuminate\Support\Facades\Validator;

class FormEmailAdminValidator
{
    public function __construct($request)
    {
        $this->request = $request;
        // Правила проверки
        $this->rules=array(
            'email' => "required|string|max:50|email:strict"
        );

        // Кастомные сообщения
        $this->messages = [
            'required' => 'Поле не должно быть пустым.',
            'string' => 'Поле типа string.',
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
