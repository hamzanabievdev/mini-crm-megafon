<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
                'appeal_id' => 'required|integer|exists:appeals,id',
                'message' => 'required|string',
            ]);

        $data['backoffice_id'] = auth()->user()->id;

        $comment = Comment::create($data);
        $user = User::find($comment->backoffice_id);

        return response()->json([
            'comment' => $comment,
            "user" => $user
        ]);
    }
     public function list(Request $request)
     {
         $data = $request->validate([
                'appeal_id' => 'required|integer',
            ]);
            
        $commentList = Comment::where('appeal_id', $data['appeal_id'])->get();

        return response()->json($commentList);
    }
}
