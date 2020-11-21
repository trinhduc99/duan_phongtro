<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $successStatus = 200;

    public function adminGetAllUser () {
        $users = User::get();
        return view('admin.users.user', ['users' => $users]);
    }
    public function adminGetAllAdmin () {
        $users = User::get();
        return view('admin.users.admin', ['users' => $users]);
    }


     




}
