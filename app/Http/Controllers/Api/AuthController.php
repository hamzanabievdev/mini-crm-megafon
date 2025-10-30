<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'login' => 'sometimes|string|unique:users,login|required_without:email',
            'email' => 'sometimes|email|unique:users,email|required_without:login',
            'role' => 'required|string|in:admin,operator,backoffice',
            'password' => 'required|string|min:5',
        ], [
            'full_name.required' => 'Введите ФИО сотрудника.',
            'login.required_without' => 'Введите логин или укажите email.',
            'login.unique' => 'Пользователь с таким логином уже существует.',
            'login.string' => 'Логин должен быть строкой.',
            'email.required_without' => 'Введите email или укажите логин.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.unique' => 'Пользователь с таким email уже существует.',
            'role.required' => 'Выберите роль сотрудника.',
            'role.in' => 'Выберите допустимую роль: admin, operator или backoffice.',
            'password.required' => 'Введите пароль.',
            'password.min' => 'Пароль должен содержать не менее :min символов.',
    ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return response()->json([
            'message' => "successfully registered",
            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'login';

        if (!Auth::attempt([$field => $credentials['login'], 'password' => $credentials['password']])) {
            return response()->json(['message' => 'invalid login or password'], 401);
        }

        $user = Auth::user();

        return response()->json([
            'message' => 'successfully logged in',
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
