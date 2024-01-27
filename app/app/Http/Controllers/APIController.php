<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Services\CRUD\MessageCRUD;
use App\Services\Validator\CreateMessageValidator;
use Illuminate\Http\Request;

use App\Mail\SendMail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;


class APIController extends Controller
{
    public function __construct()
    {
        $this->message_crud = new MessageCRUD();
    }

    // Создание текста
    public function create_message(Request $request)
    {
        // Валидация знаячений ключей в запросе
        $create_message_validator = new CreateMessageValidator($request);
        $create_message_validator->run_validator();
        $error = $create_message_validator->error_validator();

        // Если есть ошибки, отдает клиенту
        if ($error)
        {
            return ['result' => 'error', 'errors' => $error];
        }
        else
        {
            // Создает сообщение
            $message_create = 'Неудалось создать сообщение.';
            if ($this->message_crud->create_message($request)) $message_create = 'Сообщение создано.';

            // Получает пользователя root
            $user_root = Role::with('user')->where('slug', 'root')->first();
            // Получает почту пользователя root
            $email_root = $user_root->user[0]->email;

            /* Имя отправителя
             * Телефон отправителя
             * Почта отправителя
             */
            $name_sender = $request->name;
            $phone_sender = $request->phone;
            $email_sender = $request->email;

            // Отправляет сообщение на почту админа
            Mail::to($email_root)->send(new SendMail($name_sender, $phone_sender, $email_sender));

            return response()->json([
                'result' => 'OK',
                'message_create' => $message_create,
                'message_send' => 'Сообщение отправлено.',
            ]);
        }
    }

    public function get_token()
    {
        // Отдает csrf token
        return response()->json([
            'token' => csrf_token(),
        ]);
    }
}
