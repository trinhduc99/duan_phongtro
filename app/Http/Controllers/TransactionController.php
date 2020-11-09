<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Support\Facades\Validator;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payee_id' => 'required|bail|integer'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=> 'Bad request',
            ],400);
        }
        $user = User::where('id', $request['payee_id'])->count();
        if ($user != 1) {
            return response()->json([
                'message'=> 'Bad request',
            ],400);
        }
        $data = Transaction::select('amount', 'post_id', 'status', 'note', 'created_at')->where('payee_id', $request['payee_id'])->orderBy('created_at', 'desc')->get();
        return response()->json([
            'message'=> 'Success', 'data' => $data
        ],200);
    }
    public function create (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payee_id' => 'required|bail|integer',
            'amount' => 'required|bail|numeric',
            'post_id' => 'required|bail|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=> 'Bad request',
            ],400);
        }
        $conditions = [
            'id' => $request['post_id'],
            'creator_id' => $request['payee_id']
        ];
        $post = Post::where($conditions)->count();
        if ($post != 1) {
            return response()->json([
                'message'=> 'Bad request',
            ],400);
        }

        $conditions = [
            'id' => $request['payee_id'],
            ['amount', '>', $request['amount']]
        ];
        $userAmount = User::select('amount')->where($conditions)->count();
        if ($userAmount != 1) {
            return response()->json([
                'message'=> 'Bad request',
            ],400);
        }

        $transaction = Transaction::create([
           'payee_id' => $request['payee_id'],
            'amount' => $request['amount'],
            'post_id' => $request['post_id']
        ]);

        $user = User::firstWhere('id', $request['payee_id']);
        $user['amount'] = (double)$user['amount'] - (double)$request['amount'] ;
        $user->save();
        return response()->json([
            'message'=> 'Success'
        ],200);
    }
}
