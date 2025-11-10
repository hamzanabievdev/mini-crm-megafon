<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $user = Auth::user();
            if($user->role == "admin") {
                return view('admin.main', compact('user'));
            } elseif($user->role == "operator") {
                return view('operator.main', compact('user'));
            } elseif($user->role == "backoffice") {
                return view('backoffice.main', compact('user'));
            }
        } else {
            return view('auth');
        }
    }
}
