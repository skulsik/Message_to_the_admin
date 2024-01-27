<?php

namespace App\Services\CRUD;
use App\Models\Message;

class MessageCRUD
{
    /* Создание сообщения */
    public function create_message($request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $result = $message->save();
        if ($result) return true;
    }
}
