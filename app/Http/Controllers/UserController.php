<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function signup_valid(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ], [
            'login.required' => 'Поле обязательно для заполнения!',
            'email.required' => 'Поле обязательно для заполнения!',
            'password.required' => 'Поле обязательно для заполнения!',
            'confirm_password.required' => 'Поле обязательно для заполнения!',
            'login.unique' => 'Даный никнейм занят!',
            'email.unique' => 'Данная почта занята!',
            'email.email' => 'Введите действительный адрес!',
            'password.min' => 'Минимум 6 символов!',
            'сonfirm_password.same' => 'Пароли должны совпадать!',
        ]);

        $signupData = $request->all();

        $user = User::create([
            'login' => $signupData['login'],
            'email' => $signupData['email'],
            'password' => $signupData['password'],
            'id_role' => 2,
        ]);

        if ($user) {
            Auth::login($user);
            return redirect('/')->with('success', 'Успешная регистрация!');
        } else {
            return redirect()->back()->with('error', 'Ошибка регистрации!');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function signin()
    {
        return view('signin');
    }

    public function signin_valid(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Поле обязательно для заполнения!',
            'password.required' => 'Поле обязательно для заполнения!',
            'email.email' => 'Введите действительный адрес!',
            'password.min' => 'Минимум 6 символов!',
        ]);

        $signinData = $request->all();

        if (Auth::attempt([
            'email' => $signinData['email'],
            'password' => $signinData['password'],
        ])) {
            if (Auth::user()->id_role == 1) {
                return redirect('/admin')->with('success', 'Здраствуй админ!');
            } else {
                return redirect('/')->with('success', 'Вы успешно авторизировались!');
            }
        } else {
            return redirect()->back()->with('error', 'Ошибка авторизации!');
        }
    }
}
