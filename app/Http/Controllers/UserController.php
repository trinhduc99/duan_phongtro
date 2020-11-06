<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

    public function register (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['group_id'] = ($request['admin'] == User::$GROUP_ID['admin']) ?: User::$GROUP_ID['user'];
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

    public function logout ()
    {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }

    public function isAdminGroup ($userId)
    {
        $user = User::select('group_id')->where('id', $userId)->get();
        $user = $user[0]['group_id'];
        return $user == User::$GROUP_ID['admin'];
    }
    public function isUserGroup ($userId)
    {
        $user = User::select('group_id')->where('id', $userId)->get();
        $user = $user[0]['group_id'];
        return $user == User::$GROUP_ID['user'];
    }



    public function hello (Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer'
        ]);
        $data = [];
        if ($validator->fails()) {
            $data = ['http_error' => 400, 'error' => true, 'message' => 'Bad request'];
            $data = json_encode($data);
            return view('pages.test', ['data' => $data]);
        }
        $userId = (int)$request['id'];
        $data['result'] = $this->isAdminGroup($userId);
        $success = 'Success';
        $data['success'] = $success;
        $data['status'] = $this->successStatus;
        $data = json_encode($data);
        return view('pages.test', ['data' => $data]);
    }
}
