<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appeal;

class AppealController extends Controller
{
    public function index()
    {
        return response()->json(Appeal::all());
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $appeals = Appeal::where('full_name', 'like', "%{$query}%")
            ->orWhere('personal_account', 'like', "%{$query}%")
            ->orWhere('phone', 'like', "%{$query}%")
            ->get();

        return response()->json($appeals);
    }

    public function show($id)
    {
        $appeal = Appeal::with('comments.user', 'operator')->findOrFail($id);
        return response()->json($appeal);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string',
            'personal_account' => 'required|string',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        Appeal::create($data);

        return response()->json(['message' => 'successful created']);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'sometimes|string',
            'operator_id' => 'sometimes|integer',
        ]);

        $appeal = Appeal::findOrFail($id);

        if (isset($data['status'])) {
            $appeal->status = $data['status'];
        }
        if (isset($data['operator_id'])) {
            $appeal->operator_id = $data['operator_id'];
        }

        $appeal->save();

        return response()->json([
            'message' => 'successful updated',
            'appeal' => $appeal,
            'operator' => $appeal->operator
        ]);
    }

}
