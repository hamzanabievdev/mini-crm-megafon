<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appeal;
use App\Models\User;


class AppealController extends Controller
{
    public function index($id)
    {
        $appeal = Appeal::with(['comments.user'])->findOrFail($id);
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
            return view('admin.appeal', compact('appeal', 'user', 'contentInfo'));
        } elseif($user->role == "operator") {
            $menuName = "Клиенты";
            $pageTitle = "Обращение/Жалоба - ".$appeal->subject;
            $tabName = "Список Обращений/Жалоб";
            $contentInfo = (object)[
                "roleName" => "Спец. Бэк-офиса",
                "menuName" => $menuName,
                "pageTitle" => $pageTitle,
                "tabName" => $tabName
            ];
            return view('operator.appeal', compact('appeal', 'user', 'contentInfo'));
            
        } elseif($user->role == "backoffice") {
            $operators = User::where('role', 'operator')->get();
            $menuName = "Клиенты";
            $pageTitle = "Обращение/Жалоба - ".$appeal->subject;
            $tabName = "Список Обращений/Жалоб";
            $contentInfo = (object)[
                "roleName" => "Спец. Бэк-офиса",
                "menuName" => $menuName,
                "pageTitle" => $pageTitle,
                "tabName" => $tabName
            ];
            return view('backoffice.appeal', compact('appeal', 'user', 'contentInfo', 'operators'));
        }
    }
}
