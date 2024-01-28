<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    // Форма изменения электронной почты
    public function form_admin_email()
    {
        if(Auth::user())
        {
            $email_user_root = Auth::user()->email;
            return view('form_admin_email', ['email' => $email_user_root]);
        }
        else return view('404');
    }

    // Изменение электронной почты - записи в бд
    public function update_admin_email(Request $request)
    {
        // Валидация поля email в запросе
        //$email_validator = new FormEmailAdminValidator($request);
        //$email_validator->run_validator();
        //$errors = $email_validator->error_validator();

        $validated = $request->validate([
            'email' => 'required|string|max:50|email:dns'
        ]);

        if(Auth::user())
        {
            $user_root = Auth::user();
            $user_root->email = $request->email;
            $user_root->save();
        }

        return redirect()->route('form_admin_email');
    }
}
