<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\PostInterest;
use Illuminate\Validation\Rule;

class PostInterestController extends Controller
{
    public function create (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|bail|integer',
            'user_id' => 'required|bail|integer',
        ]);
        $data = [];
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Registration failed',
                'error'=>$validator->errors()], 400);
        }

        return response()->json([
            'success' => 'success',
        ],200);
    }
}
