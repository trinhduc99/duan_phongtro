<?php

namespace App\Http\Controllers;

use App\PayIn;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PayInController extends Controller
{
    public function index (Request $request)
    {

    }

    public function payIn (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required|bail|integer',
            'amount' => 'required|bail|numeric',
            'depositor_id' => 'required|bail|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=> 'Bad request',
            ],400);
        }
        $userCondition = [
            'id' => $request['receiver_id'],
            'group_id' => User::$GROUP_ID['user']
        ];
        $checkReceiver = User::where($userCondition)->count();
        if ($checkReceiver != 1) {
            return response()->json([
                'message'=> 'Bad request',
            ],400);
        }
        $depositorCondition = [
            'id' => $request['depositor_id'],
            'group_id' => User::$GROUP_ID['admin']
        ];
        $checkDepositor = User::where($depositorCondition)->count();
        if ($checkDepositor != 1) {
            return response()->json([
                'message'=> 'Bad request',
            ],400);
        }
        $payIn = PayIn::create([
            'receiver_id' => $request['receiver_id'],
            'depositor_id' => $request['depositor_id'],
            'amount' => $request['amount']
        ]);
        $user = User::where('id', $request['receiver_id'])->get();
        $user = $user[0];
        $user['amount'] = (double)$user['amount'] + (double)$request['amount'];
        $user->save();
        return response()->json([
            'message'=> 'Success'
        ],200);
    }
}
