<?php

namespace App\Services\Api\CRUD;
use App\Models\Message;

class MessageCRUD
{
    /* Создание сообщения */
    public function create_message($request)
    {
        $slug = preg_replace('/[0-9]+/', '', csrf_token());
        $slug = str_shuffle($slug);
        $message = new Message();
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->slug = $slug;
        $result = $message->save();
        if ($result) return true;
    }
}
