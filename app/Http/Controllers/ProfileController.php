<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('front_end.profile.index');
    }
    public function create()
    {
        return view('front_end.profile.add');
    }
}
