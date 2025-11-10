<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function list()
    {
        return response()->json(User::all());
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $appeals = User::where('full_name', 'like', "%{$query}%")
            ->orWhere('login', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->get();

        return response()->json($appeals);
    }
}
