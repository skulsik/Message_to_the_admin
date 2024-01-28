<?php

namespace App\Http\Controllers;


use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Список сообщений
    public function list_messages()
    {
        if(Auth::user())
        {
            $list_messages = Message::orderBy('id')->get();
            return view('list_messages', ['list_messages' => $list_messages]);
        }
        else return view('404');
    }

    // Удаление сообщения
    public function delete_message($id)
    {
        if(Auth::user())
        {
            $text = Message::find($id);
            $text->delete();
        }
        return redirect()->route('list_messages');
    }
}
