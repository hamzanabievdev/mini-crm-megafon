<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        if (auth()->check()) {
            $user = Auth::user();
            if($user->role == "admin") {
                $menuName = "Сотрудники";
                $pageTitle = "Список сотрудников";
                $contentInfo = (object)[
                    "roleName" => "Администратор",
                    "menuName" => $menuName,
                    "pageTitle" => $pageTitle,
                    "tabName" => $pageTitle
                ];
                
                return view('admin.main', compact('contentInfo', 'user'));

            } elseif($user->role == "operator") {
                $menuName = "Клиенты";
                $pageTitle = "Список обращений/жалоб";
                $contentInfo = (object)[
                    "roleName" => "Оператор",
                    "menuName" => $menuName,
                    "pageTitle" => $pageTitle,
                    "tabName" => $pageTitle
                ];

                return view('operator.main', compact('contentInfo', 'user'));

            } elseif($user->role == "backoffice") {
                $menuName = "Клиенты";
                $pageTitle = "Список Обращений/Жалоб";
                $contentInfo = (object)[
                    "roleName" => "Спец. Бэк-офиса",
                    "menuName" => $menuName,
                    "pageTitle" => $pageTitle,
                    "tabName" => $pageTitle
                ];

                return view('backoffice.main', compact('contentInfo', 'user'));

            }
        } else {
            return view('auth');
        }
    }
}
